"""Behavioral tests for incremental collection; no Bexio API writes or network."""

import copy
import gzip
import io
import json
from pathlib import Path
import subprocess
import tempfile
import unittest
from unittest.mock import patch
import urllib.error

import sync


def example_spec():
    return {
        "openapi": "3.0.2",
        "info": {"title": "Fixture", "version": "1", "description": "Intro\n# Changelog\nOld entry\n# Auth\nText\n"},
        "servers": [{"url": "https://api.example.test"}],
        "security": [{"bearer": []}],
        "paths": {
            "/2.0/things": {"get": {"responses": {"200": {"content": {
                "application/json": {"schema": {"$ref": "#/components/schemas/Thing"}}
            }}}}},
            "/2.0/other": {"get": {"responses": {"204": {"description": "Empty"}}}},
            "/internal/stub": {"x-alias": "/internal/stub"},
        },
        "components": {
            "securitySchemes": {"bearer": {"type": "http", "scheme": "bearer"}},
            "schemas": {"Thing": {"type": "object", "properties": {
                "id": {"type": "integer"},
                "children": {"type": "array", "items": {"$ref": "#/components/schemas/Thing"}},
            }}},
        },
    }


def embed(spec):
    return '<html><script>const __redoc_state = ' + json.dumps({"spec": {"data": spec}}) + '; Redoc.hydrate(__redoc_state);</script></html>'


class SyncTests(unittest.TestCase):
    def setUp(self):
        self.temp = tempfile.TemporaryDirectory()
        self.addCleanup(self.temp.cleanup)
        self.root = Path(self.temp.name)
        self.directory = self.root / "docs" / "api-sync"
        self.spec = example_spec()
        (self.root / "client.php").write_text("<?php // implementation\n")
        (self.root / "composer.json").write_text(json.dumps({"name": "gigerit/bexio-api-client"}))

    def collect(self, spec=None, unchanged=False, **options):
        result = (None if unchanged else copy.deepcopy(spec or self.spec), {
            "http_status": 304 if unchanged else 200, "download_bytes": 0 if unchanged else 1000,
            "etag": '"fixture"', "last_modified": None,
        })
        with patch.object(sync, "fetch", return_value=result) as fetch:
            state = sync.check(self.directory, self.root, **options)
        return state, fetch

    def resolve(self, state, keys=None, outcome="already-current"):
        return sync.record(self.directory, self.root, state["last_run"]["id"], [{
            "keys": list(state["pending"]) if keys is None else keys,
            "outcome": outcome, "reason": "Fixture implementation matches this test contract",
            "files": ["client.php"], "checks": ["Fixture verification passed"],
        }])

    def test_extract_ignores_braces_inside_strings_and_refuses_missing_or_empty_spec(self):
        self.spec["info"]["description"] = 'Text with }; and "quotes" and Unicode ä'
        self.assertEqual(sync.extract(embed(self.spec)), self.spec)
        for html in ("<html>Upstream unavailable</html>", embed({"openapi": "3.0.2", "paths": {}})):
            with self.assertRaises(ValueError):
                sync.extract(html)

    def test_semantic_changes_follow_cyclic_shared_references_and_auth(self):
        original = {k: sync.digest(v) for k, v in sync.units(self.spec).items()}
        self.spec["components"]["schemas"]["Thing"]["properties"]["id"]["type"] = "string"
        changed = {k: sync.digest(v) for k, v in sync.units(self.spec).items()}
        self.assertNotEqual(original["GET /2.0/things"], changed["GET /2.0/things"])
        self.assertEqual(original["GET /2.0/other"], changed["GET /2.0/other"])
        self.spec["components"]["securitySchemes"]["bearer"]["description"] = "New authentication guidance"
        self.assertNotEqual(changed["GET /2.0/other"], sync.digest(sync.units(self.spec)["GET /2.0/other"]))
        self.assertNotIn("GET /internal/stub", changed)
        self.assertIn("/internal/stub", sync.units(self.spec)["meta/path-stubs"])

    def test_object_order_is_ignored_but_backdated_prose_and_path_parameters_change(self):
        reversed_spec = json.loads(json.dumps(self.spec, sort_keys=True))
        self.assertEqual(sync.digest(self.spec), sync.digest(reversed_spec))
        before = sync.units(self.spec)
        self.spec["info"]["description"] = self.spec["info"]["description"].replace("Old entry", "Corrected old entry")
        self.spec["paths"]["/2.0/things"]["parameters"] = [{"in": "query", "name": "page", "schema": {"type": "integer"}}]
        after = sync.units(self.spec)
        self.assertNotEqual(before["guide/Changelog"], after["guide/Changelog"])
        self.assertEqual(before["guide/Auth"], after["guide/Auth"])
        self.assertNotEqual(before["GET /2.0/things"], after["GET /2.0/things"])

    def test_markdown_fences_remain_in_their_guide_section(self):
        description = '# Auth\n```bash\n# Shell comment\necho "hello"\n```\n## Scopes\nRead\n'
        sections = sync.guide_sections(description)
        self.assertEqual(list(sections), ["guide/Auth", "guide/Auth/Scopes"])
        self.assertEqual("".join(sections.values()), description)

    def test_first_check_and_partial_304_never_claim_success_or_lose_notes(self):
        state, _ = self.collect()
        key, run_id = "GET /2.0/things", state["last_run"]["id"]
        self.assertIsNone(sync.summary(state)["last_successful_run"])
        sync.note(self.directory, run_id, key, "Live update not verified; next: run disposable flow")
        state = sync.finish(self.directory, self.root, run_id)
        self.assertEqual(state["last_run"]["status"], "partial")
        after, _ = self.collect(unchanged=True)
        self.assertEqual(after["pending"], state["pending"])
        self.assertNotIn("last_successful_run", after)
        self.assertEqual(len(list((self.directory / "snapshots").glob("*.json.gz"))), 1)

    def test_success_then_new_source_change_preserves_old_success_until_resolved(self):
        state, _ = self.collect()
        state = self.resolve(state)
        state = sync.finish(self.directory, self.root, state["last_run"]["id"])
        success = state["last_successful_run"]
        self.spec["paths"]["/2.0/things"]["get"]["summary"] = "Updated summary"
        after, _ = self.collect()
        self.assertEqual(list(after["pending"]), ["GET /2.0/things"])
        self.assertEqual(after["last_successful_run"], success)
        self.assertNotEqual(sync.show(self.directory, "GET /2.0/things", True), sync.show(self.directory, "GET /2.0/things"))
        after = self.resolve(after)
        sync.finish(self.directory, self.root, after["last_run"]["id"])
        unchanged, _ = self.collect(unchanged=True)
        self.assertEqual(unchanged["pending"], {})

    def test_failed_fetch_preserves_observed_pending_and_last_checked(self):
        state, _ = self.collect()
        with patch.object(sync, "fetch", side_effect=OSError("Network unavailable")), self.assertRaises(OSError):
            sync.check(self.directory, self.root)
        failed = sync.read_state(self.directory)
        for key in ("observed", "pending", "last_checked_at", "resolved"):
            self.assertEqual(failed[key], state[key])
        self.assertEqual(failed["last_run"]["status"], "failed")
        with self.assertRaises(ValueError):
            sync.finish(self.directory, self.root, failed["last_run"]["id"])

    def test_removed_unreviewed_and_reviewed_operations_remain_pending_until_disposed(self):
        first, _ = self.collect()
        self.resolve(first, ["GET /2.0/things"])
        self.spec["paths"].pop("/2.0/things")
        self.spec["paths"].pop("/2.0/other")
        self.spec["paths"]["/new"] = {"get": {"responses": {}}}
        state, _ = self.collect()
        for key in ("GET /2.0/things", "GET /2.0/other"):
            self.assertEqual(state["pending"][key]["reason"], "removed")
            self.assertIsNone(sync.show(self.directory, key))
        self.resolve(state)
        state, _ = self.collect(unchanged=True)
        self.assertFalse(state["pending"])

    def test_external_reference_failure_cannot_advance_snapshot(self):
        old, _ = self.collect()
        self.spec["components"]["schemas"]["Thing"] = {"$ref": "https://example.test/schema.json"}
        with self.assertRaises(ValueError):
            self.collect()
        self.assertEqual(sync.read_state(self.directory)["observed"], old["observed"])

    def test_reverted_implementation_reopens_on_check_and_before_finish(self):
        state, _ = self.collect()
        state = self.resolve(state)
        (self.root / "client.php").write_text("<?php // reverted\n")
        state = sync.finish(self.directory, self.root, state["last_run"]["id"])
        self.assertEqual(state["last_run"]["status"], "partial")
        self.assertTrue(all(item["reason"] == "implementation-drift" for item in state["pending"].values()))
        state = self.resolve(state)
        sync.finish(self.directory, self.root, state["last_run"]["id"])
        (self.root / "client.php").unlink()
        state, _ = self.collect(unchanged=True)
        self.assertTrue(state["pending"])

    def test_reconciliation_and_pending_work_survive_repeated_304(self):
        state, _ = self.collect()
        self.resolve(state)
        state, _ = self.collect(unchanged=True, reconcile=True)
        self.assertEqual(len(state["pending"]), len(state["observed"]["fingerprints"]))
        pending = state["pending"]
        again, _ = self.collect(unchanged=True)
        self.assertEqual(again["pending"], pending)

    def test_stale_run_and_invalid_batch_cannot_partially_record(self):
        first, _ = self.collect()
        current, _ = self.collect(unchanged=True)
        with self.assertRaises(ValueError):
            self.resolve(first)
        with self.assertRaises(ValueError):
            sync.record(self.directory, self.root, current["last_run"]["id"], [
                {"keys": ["GET /2.0/things"], "outcome": "docs-only", "reason": "Prose only"},
                {"keys": ["GET /2.0/other"], "outcome": "implemented", "reason": "No validation supplied"},
            ])
        self.assertEqual(sync.read_state(self.directory)["pending"], current["pending"])

    def test_missing_cache_forces_fetch_and_corrupt_cache_fails_closed(self):
        state, _ = self.collect()
        path = self.directory / "snapshots" / (state["observed"]["snapshot"] + ".json.gz")
        path.unlink()
        _, fetch = self.collect()
        self.assertTrue(fetch.call_args.args[1])
        path.write_bytes(gzip.compress(b'{}'))
        with self.assertRaisesRegex(ValueError, "integrity"):
            self.collect()

    def test_thirty_day_refresh_bypasses_validators(self):
        state, _ = self.collect()
        state["observed"]["full_fetch_at"] = "2000-01-01T00:00:00+00:00"
        sync.save(self.directory, state)
        _, fetch = self.collect()
        self.assertTrue(fetch.call_args.args[1])

    def test_large_operation_loss_needs_verified_override(self):
        for index in range(30):
            self.spec["paths"][f"/resource/{index}"] = {"get": {"responses": {}}}
        first, _ = self.collect()
        for index in range(15):
            del self.spec["paths"][f"/resource/{index}"]
        with self.assertRaisesRegex(ValueError, "operations disappeared"):
            self.collect()
        self.assertEqual(sync.read_state(self.directory)["observed"], first["observed"])
        accepted, _ = self.collect(accept_large_removal=True)
        self.assertEqual(accepted["pending"]["GET /resource/0"]["reason"], "removed")

    def test_http_gzip_etag_304_last_modified_and_force(self):
        response = io.BytesIO(gzip.compress(embed(self.spec).encode()))
        response.headers = {"Content-Encoding": "gzip", "ETag": '"v1"'}
        response.url, response.status = sync.SOURCE, 200
        with patch.object(sync.urllib.request, "urlopen", return_value=response):
            spec, metrics = sync.fetch(None)
        self.assertEqual(spec, self.spec)
        self.assertEqual(metrics["etag"], '"v1"')
        error = urllib.error.HTTPError(sync.SOURCE, 304, "Not modified", {}, io.BytesIO())
        self.addCleanup(error.close)
        with patch.object(sync.urllib.request, "urlopen", side_effect=error) as request:
            spec, metrics = sync.fetch({"etag": '"v1"'})
            self.assertIsNone(spec)
            self.assertEqual(metrics["download_bytes"], 0)
            self.assertEqual(request.call_args.args[0].get_header("If-none-match"), '"v1"')
            sync.fetch({"last_modified": "Mon, 01 Jan 2024 00:00:00 GMT"})
            self.assertIn("If-modified-since", request.call_args.args[0].headers)
            with self.assertRaises(urllib.error.HTTPError):
                sync.fetch({"etag": '"v1"'}, force=True)
            self.assertNotIn("If-none-match", request.call_args.args[0].headers)

    def test_cli_reads_state_and_renders_targeted_diff(self):
        state, _ = self.collect()
        script = str(Path(sync.__file__).resolve())
        base = ["python3", script, "--state-dir", str(self.directory)]
        status = subprocess.run(base + ["status", "--list", "--contains", "things"], cwd=self.root, text=True, capture_output=True, check=True)
        self.assertEqual(list(json.loads(status.stdout)["items"]), ["GET /2.0/things"])
        self.resolve(state)
        self.spec["paths"]["/2.0/things"]["get"]["summary"] = "Changed contract"
        self.collect()
        diff = subprocess.run(base + ["diff", "GET /2.0/things"], cwd=self.root, text=True, capture_output=True, check=True)
        self.assertTrue(any(line.startswith("+") and '"summary": "Changed contract"' in line for line in diff.stdout.splitlines()))

    def test_lock_prevents_overlapping_mutations(self):
        with sync.locked(self.directory):
            with self.assertRaisesRegex(ValueError, "Another sync command"):
                with sync.locked(self.directory):
                    self.fail("Second writer acquired the lock")

    def test_interrupted_atomic_publish_keeps_previous_checkpoint_readable(self):
        state, _ = self.collect()
        before = (self.directory / "state.json").read_bytes()
        with patch.object(sync.os, "replace", side_effect=OSError("Interrupted")), self.assertRaises(OSError):
            sync.write_json(self.directory / "state.json", {"partial": True})
        self.assertEqual((self.directory / "state.json").read_bytes(), before)
        self.assertEqual(sync.read_state(self.directory), state)
        self.assertEqual(list(self.directory.glob(".tmp-*")), [])


if __name__ == "__main__":
    unittest.main()
