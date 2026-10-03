#!/usr/bin/env python3
"""Collect Bexio's embedded OpenAPI contract and checkpoint reviewed changes.

Python standard library only. Network access is confined to the public docs;
implementation, live API tests, and semantic decisions belong to the skill.
"""

import argparse
import contextlib
import datetime as dt
import difflib
import fcntl
import gzip
import hashlib
import json
import os
from pathlib import Path
import re
import sys
import tempfile
import time
import urllib.error
import urllib.request
import uuid

SOURCE = "https://docs.bexio.com/"
VERSION = 1
METHODS = {"get", "post", "put", "patch", "delete", "head", "options", "trace"}
OUTCOMES = {"implemented", "already-current", "docs-only", "not-applicable"}


def now():
    return dt.datetime.now(dt.timezone.utc).isoformat()


def canonical(value):
    return json.dumps(value, sort_keys=True, ensure_ascii=False, separators=(",", ":")).encode()


def digest(value):
    return hashlib.sha256(canonical(value)).hexdigest()


def atomic_write(path, data):
    path.parent.mkdir(parents=True, exist_ok=True)
    fd, name = tempfile.mkstemp(prefix=".tmp-", dir=path.parent)
    try:
        with os.fdopen(fd, "wb") as handle:
            handle.write(data)
            handle.flush()
            os.fsync(handle.fileno())
        os.replace(name, path)
    finally:
        if os.path.exists(name):
            os.unlink(name)


def write_json(path, value):
    atomic_write(path, (json.dumps(value, indent=2, ensure_ascii=False) + "\n").encode())


def extract(html):
    # raw_decode understands escaped quotes/braces; JavaScript is never evaluated.
    match = re.search(r"\b(?:const|let|var)\s+__redoc_state\s*=\s*", html)
    if not match:
        raise ValueError("Embedded __redoc_state missing; inspect the official page before adapting extraction")
    state, _ = json.JSONDecoder().raw_decode(html, match.end())
    spec = state["spec"]["data"]
    if not str(spec.get("openapi", "")).startswith("3.") or not isinstance(spec.get("paths"), dict):
        raise ValueError("Expected an OpenAPI 3 document with paths")
    if not any(method in item for item in spec["paths"].values() for method in METHODS):
        raise ValueError("Documentation contains no operations; refusing an empty baseline")
    return spec


def fetch(observed, force=False):
    headers = {"User-Agent": "BexioClientDocsSync/1.0", "Accept-Encoding": "gzip", "Cache-Control": "no-cache"}
    if observed and not force:
        if observed.get("etag"):
            headers["If-None-Match"] = observed["etag"]
        elif observed.get("last_modified"):
            headers["If-Modified-Since"] = observed["last_modified"]
    request = urllib.request.Request(SOURCE, headers=headers)
    try:
        with urllib.request.urlopen(request, timeout=45) as response:
            if response.url != SOURCE:
                raise ValueError(f"Documentation redirected to {response.url}; verify the new source first")
            body = response.read()
            size = len(body)
            if response.headers.get("Content-Encoding") == "gzip":
                body = gzip.decompress(body)
            return extract(body.decode("utf-8")), {
                "http_status": response.status, "download_bytes": size,
                "etag": response.headers.get("ETag"),
                "last_modified": response.headers.get("Last-Modified"),
            }
    except urllib.error.HTTPError as error:
        if error.code == 304 and observed and not force:
            error.close()
            return None, {"http_status": 304, "download_bytes": 0,
                          "etag": observed.get("etag"), "last_modified": observed.get("last_modified")}
        raise


def references(value):
    if isinstance(value, dict):
        if "$ref" in value:
            yield value["$ref"]
        for child in value.values():
            yield from references(child)
    elif isinstance(value, list):
        for child in value:
            yield from references(child)


def pointer(spec, ref):
    if not ref.startswith("#/"):
        raise ValueError(f"External reference requires verified collection support: {ref}")
    value = spec
    for part in ref[2:].split("/"):
        part = part.replace("~1", "/").replace("~0", "~")
        value = value[int(part)] if isinstance(value, list) else value[part]
    return value


def with_dependencies(spec, value):
    dependencies = {}
    queue = list(references(value))
    while queue:
        ref = queue.pop()
        if ref in dependencies:
            continue
        target = pointer(spec, ref)
        dependencies[ref] = target
        queue.extend(references(target))
    return {"value": value, "references": dependencies} if dependencies else value


def guide_sections(description):
    """Preserve prose/code exactly, splitting only Markdown headings outside fences."""
    sections, headings, lines = {}, [], []
    key, fence = "guide/Introduction", None
    for line in description.splitlines(keepends=True):
        marker = re.match(r"^\s*(`{3,}|~{3,})", line)
        if marker:
            token = marker[1]
            if fence is None:
                fence = token
            elif token[0] == fence[0] and len(token) >= len(fence):
                fence = None
        heading = re.match(r"^(#{1,6})\s+(.+?)\s*#*\s*$", line) if fence is None else None
        if heading:
            if lines:
                if key in sections:
                    raise ValueError(f"Duplicate guide section: {key}")
                sections[key] = "".join(lines)
            level, title = len(heading[1]), heading[2]
            headings = [(depth, text) for depth, text in headings if depth < level] + [(level, title)]
            key, lines = "guide/" + "/".join(text for _, text in headings), []
        lines.append(line)
    if lines:
        if key in sections:
            raise ValueError(f"Duplicate guide section: {key}")
        sections[key] = "".join(lines)
    return sections


def units(spec):
    result = guide_sections(spec.get("info", {}).get("description", ""))
    for key, value in spec.items():
        if key in {"paths", "components"}:
            continue
        if key == "info":
            value = {k: v for k, v in value.items() if k != "description"}
        result["meta/" + key] = with_dependencies(spec, value)
    for group, members in spec.get("components", {}).items():
        for name, value in members.items():
            result[f"component/{group}/{name}"] = with_dependencies(spec, value)
    stubs = {}
    schemes = spec.get("components", {}).get("securitySchemes", {})
    for path, item in spec["paths"].items():
        if "$ref" in item:
            raise ValueError(f"Referenced path item needs collection support: {path}")
        context = {k: v for k, v in item.items() if k not in METHODS}
        if not METHODS.intersection(item):
            stubs[path] = context
        for method in METHODS.intersection(item):
            operation = item[method]
            security = operation.get("security", spec.get("security", []))
            value = {
                "operation": operation, "path_context": context,
                "servers": operation.get("servers", item.get("servers", spec.get("servers", []))),
                "security": security,
                "security_schemes": {name: schemes[name] for req in security for name in req},
            }
            result[f"{method.upper()} {path}"] = with_dependencies(spec, value)
    # Redoc currently includes many empty/internal path stubs: these aren't APIs.
    result["meta/path-stubs"] = stubs
    return result


def load_snapshot(directory, checksum):
    data = gzip.decompress((directory / "snapshots" / f"{checksum}.json.gz").read_bytes())
    if hashlib.sha256(data).hexdigest() != checksum:
        raise ValueError(f"Snapshot integrity failure: {checksum}")
    return json.loads(data)


def read_state(directory):
    path = directory / "state.json"
    if not path.exists():
        return {"version": VERSION, "source": SOURCE, "resolved": {}, "pending": {}}
    state = json.loads(path.read_text())
    if state.get("version") != VERSION or state.get("source") != SOURCE:
        raise ValueError("State version/source mismatch; migrate explicitly, preserving unresolved work")
    return state


def save(directory, state):
    write_json(directory / "runs" / f"{state['last_run']['id']}.json", state["last_run"])
    write_json(directory / "state.json", state)


@contextlib.contextmanager
def locked(directory):
    directory.mkdir(parents=True, exist_ok=True)
    with (directory / ".lock").open("a") as handle:
        try:
            fcntl.flock(handle, fcntl.LOCK_EX | fcntl.LOCK_NB)
        except BlockingIOError as error:
            raise ValueError("Another sync command is active; retry after it finishes") from error
        yield


def file_hash(root, name):
    path = root / name
    if Path(name).is_absolute() or not path.resolve().is_relative_to(root.resolve()):
        raise ValueError(f"Evidence file must be inside the repository: {name}")
    return hashlib.sha256(path.read_bytes()).hexdigest() if path.exists() else None


def drifted(root, decision):
    return any(file_hash(root, name) != checksum for name, checksum in decision.get("files", {}).items())


def summary(state):
    run = state.get("last_run", {})
    return {"run": run.get("id"), "status": run.get("status", "never-run"),
            "last_checked_at": state.get("last_checked_at"),
            "last_successful_run": state.get("last_successful_run"),
            "pending": len(state["pending"]), "metrics": run.get("metrics", {})}


def check(directory, root, force=False, reconcile=False, accept_large_removal=False):
    state = read_state(directory)
    run = {"id": dt.datetime.now(dt.timezone.utc).strftime("%Y%m%dT%H%M%S") + "-" + uuid.uuid4().hex[:8],
           "started_at": now(), "status": "checking", "decisions": []}
    state["last_run"] = run
    save(directory, state)
    started = time.monotonic()
    try:
        old = state.get("observed")
        full_fetch_due = not old or dt.datetime.now(dt.timezone.utc) - dt.datetime.fromisoformat(old["full_fetch_at"]) >= dt.timedelta(days=30)
        cached = None
        if old:
            try:
                cached = load_snapshot(directory, old["snapshot"])
            except FileNotFoundError:
                force = True
        spec, metrics = fetch(old, force or full_fetch_due)
        if spec is None:
            if cached is None:
                raise ValueError("HTTP 304 without a usable local snapshot")
            spec = cached
        collected = units(spec)
        inventory = {key: digest(collected[key]) for key in sorted(collected)}
        operation_keys = {key for key in inventory if key.split(" ")[0].lower() in METHODS}
        previous_operations = {key for key in old["fingerprints"] if key.split(" ")[0].lower() in METHODS} if old else set()
        removed = previous_operations - operation_keys
        if old and len(removed) > max(5, len(previous_operations) * .2) and not accept_large_removal:
            raise ValueError(f"{len(removed)} operations disappeared; verify upstream completeness before --accept-large-removal")
        checksum = digest(spec)
        snapshot_path = directory / "snapshots" / f"{checksum}.json.gz"
        if not snapshot_path.exists():
            atomic_write(snapshot_path, gzip.compress(canonical(spec), mtime=0))
        pending = {}
        for key in sorted(inventory.keys() | state["resolved"].keys() | state["pending"].keys()):
            target = inventory.get(key)
            resolved = state["resolved"].get(key)
            previous = state["pending"].get(key, {})
            drift = bool(resolved and drifted(root, resolved))
            if resolved and resolved["fingerprint"] == target and not drift and not reconcile and not previous:
                continue
            reason = "removed" if target is None else "changed" if resolved else "added" if old else "baseline"
            if previous and previous["fingerprint"] == target:
                reason = previous["reason"]
            if drift:
                reason = "implementation-drift"
            elif reconcile:
                reason = "full-reconciliation"
            pending[key] = {
                "fingerprint": target, "reason": reason,
                "base_snapshot": resolved["snapshot"] if resolved else previous.get("base_snapshot", old["snapshot"] if old else None),
                "first_seen": previous.get("first_seen", run["started_at"]),
                "notes": previous.get("notes", []),
            }
        state["observed"] = {"snapshot": checksum, "fingerprints": inventory,
                             "etag": metrics["etag"], "last_modified": metrics["last_modified"],
                             "full_fetch_at": now() if metrics["http_status"] == 200 else old["full_fetch_at"]}
        state["pending"] = pending
        state["last_checked_at"] = now()
        run.update(status="ready", snapshot=checksum, pending_at_check=len(pending),
                   metrics={**metrics, "operations": len(operation_keys), "units": len(inventory),
                            "snapshot_bytes": snapshot_path.stat().st_size,
                            "seconds": round(time.monotonic() - started, 3)})
    except Exception as error:
        run.update(status="failed", error=str(error), finished_at=now())
        save(directory, state)
        raise
    save(directory, state)
    return state


def require_run(state, run_id):
    run = state.get("last_run", {})
    if run.get("id") != run_id or run.get("status") not in {"ready", "partial"}:
        raise ValueError("Run is stale, failed, or already complete; inspect status and use the current collected run")


def record(directory, root, run_id, decisions):
    state = read_state(directory)
    require_run(state, run_id)
    if not isinstance(decisions, list) or not decisions:
        raise ValueError("Decisions must be a nonempty JSON array")
    prepared = {}
    for decision in decisions:
        outcome = decision.get("outcome")
        if outcome not in OUTCOMES or not decision.get("reason", "").strip():
            raise ValueError("Each decision needs a supported outcome and an evidence-backed reason")
        files, checks, keys = decision.get("files", []), decision.get("checks", []), decision.get("keys", [])
        if not isinstance(keys, list) or not keys:
            raise ValueError("Each decision needs an explicit nonempty keys list")
        if not isinstance(files, list) or not isinstance(checks, list) or any(not isinstance(c, str) or not c.strip() for c in checks):
            raise ValueError("files and checks must be lists; checks describe actual validation results")
        if outcome in {"implemented", "already-current"} and not files:
            raise ValueError("Implementation decisions need supporting repository files")
        if outcome == "implemented" and not checks:
            raise ValueError("Implemented changes need actual verification results")
        hashes = {name: file_hash(root, name) for name in files}
        for key in keys:
            if key not in state["pending"] or key in prepared:
                raise ValueError(f"Key is not pending or appears twice: {key}")
            prepared[key] = {"fingerprint": state["pending"][key]["fingerprint"],
                             "snapshot": state["observed"]["snapshot"], "resolved_at": now(),
                             "outcome": outcome, "reason": decision["reason"],
                             "files": hashes, "checks": checks}
    for key, decision in prepared.items():
        state["resolved"][key] = decision
        del state["pending"][key]
        state["last_run"]["decisions"].append({"key": key, **decision})
    save(directory, state)
    return state


def note(directory, run_id, key, text):
    state = read_state(directory)
    require_run(state, run_id)
    if not text.strip():
        raise ValueError("Pending notes need evidence and a next action")
    pending = state["pending"][key]
    pending["notes"].append({"at": now(), "fingerprint": pending["fingerprint"], "text": text})
    save(directory, state)
    return state


def finish(directory, root, run_id):
    state = read_state(directory)
    require_run(state, run_id)
    for key, resolved in state["resolved"].items():
        if key not in state["pending"] and drifted(root, resolved):
            state["pending"][key] = {"fingerprint": state["observed"]["fingerprints"].get(key),
                                     "reason": "implementation-drift", "base_snapshot": resolved["snapshot"],
                                     "first_seen": now(), "notes": []}
    run = state["last_run"]
    run.update(status="partial" if state["pending"] else "complete", finished_at=now(),
               pending_at_finish=state["pending"])
    if not state["pending"]:
        state["last_successful_run"] = {"id": run_id, "finished_at": run["finished_at"],
                                        "snapshot": state["observed"]["snapshot"]}
    lines = [f"# Bexio API sync {run_id}", "", f"Source: {SOURCE}",
             f"Checked: {state['last_checked_at']}", f"Result: {run['status']}",
             f"Snapshot: `{state['observed']['snapshot']}`", "", "## Decisions", ""]
    for decision in run["decisions"]:
        lines.extend([f"- `{decision['key']}` — {decision['outcome']}: {decision['reason']}",
                      *[f"  - Validation: {check}" for check in decision["checks"]]])
    lines.extend(["", "## Pending", ""])
    for key, item in state["pending"].items():
        lines.extend([f"- `{key}` — {item['reason']}", *[f"  - {entry['text']}" for entry in item["notes"]]])
    atomic_write(directory / "runs" / f"{run_id}.md", ("\n".join(lines) + "\n").encode())
    save(directory, state)
    return state


def show(directory, key, before=False):
    state = read_state(directory)
    if before:
        checksum = state["pending"].get(key, {}).get("base_snapshot")
    else:
        checksum = state.get("observed", {}).get("snapshot")
    if key not in state["pending"] and key not in state.get("observed", {}).get("fingerprints", {}):
        raise ValueError(f"Unknown item: {key}")
    return units(load_snapshot(directory, checksum)).get(key) if checksum else None


def display(value):
    return value if isinstance(value, str) else json.dumps(value, indent=2, ensure_ascii=False, sort_keys=True) + "\n"


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--state-dir", type=Path, default=Path("docs/api-sync"))
    commands = parser.add_subparsers(dest="command", required=True)
    collect = commands.add_parser("check", help="Fetch docs and queue every unreviewed change")
    collect.add_argument("--force", action="store_true", help="Download without HTTP validators")
    collect.add_argument("--reconcile", action="store_true", help="Reopen all items for a full client reconciliation")
    collect.add_argument("--accept-large-removal", action="store_true", help="Use only after verifying source completeness")
    status = commands.add_parser("status", help="Show last run and unresolved work")
    status.add_argument("--list", action="store_true")
    status.add_argument("--contains", default="")
    for name in ("show", "diff"):
        command = commands.add_parser(name, help="Inspect one item; use keys from status --list")
        command.add_argument("key")
        if name == "show":
            command.add_argument("--before", action="store_true")
    resolve = commands.add_parser("record", help="Record evidenced dispositions from a JSON array")
    resolve.add_argument("--run", required=True)
    resolve.add_argument("--decisions", type=Path, required=True)
    annotate = commands.add_parser("note", help="Persist a blocker/next action without resolving it")
    annotate.add_argument("key")
    annotate.add_argument("--run", required=True)
    annotate.add_argument("--text", required=True)
    complete = commands.add_parser("finish", help="Write the run report; success requires zero pending items")
    complete.add_argument("--run", required=True)
    args = parser.parse_args()
    root, directory = Path.cwd(), args.state_dir.resolve()
    try:
        if json.loads((root / "composer.json").read_text()).get("name") != "gigerit/bexio-api-client":
            raise ValueError("Run from the gigerit/bexio-api-client repository root")
        if args.command in {"show", "diff"}:
            after = show(directory, args.key, getattr(args, "before", False))
            if args.command == "diff":
                before = show(directory, args.key, True)
                sys.stdout.writelines(difflib.unified_diff(display(before).splitlines(True), display(after).splitlines(True),
                                                        fromfile="reviewed/" + args.key, tofile="observed/" + args.key))
            else:
                print(display(after), end="")
            return
        with locked(directory):
            if args.command == "check":
                state = check(directory, root, args.force, args.reconcile, args.accept_large_removal)
            elif args.command == "record":
                state = record(directory, root, args.run, json.loads(args.decisions.read_text()))
            elif args.command == "note":
                state = note(directory, args.run, args.key, args.text)
            elif args.command == "finish":
                state = finish(directory, root, args.run)
            else:
                state = read_state(directory)
            result = summary(state)
            if args.command == "status" and args.list:
                result["items"] = {key: item for key, item in state["pending"].items() if args.contains.lower() in key.lower()}
            print(json.dumps(result, indent=2, ensure_ascii=False))
    except (ValueError, KeyError, TypeError, OSError, urllib.error.URLError) as error:
        print(f"Sync failed: {error}", file=sys.stderr)
        sys.exit(1)


if __name__ == "__main__":
    main()
