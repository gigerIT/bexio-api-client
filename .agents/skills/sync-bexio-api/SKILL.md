---
name: sync-bexio-api
description: Check the official Bexio API documentation for changes and implement verified updates in this client, resuming from durable per-change checkpoints. Use for upstream API synchronization or documentation drift checks, including incremental and full reconciliation runs.
---

# Sync Bexio API

Bring this package into alignment with the current official API contract. Default
to implementing updates; honor a request for discovery only or a narrower scope.
Creating or editing this skill is not an instruction to run the synchronization.

## Inspect and collect

1. Read repository `AGENTS.md`, the README coverage matrix, and existing sync state
   under `docs/api-sync/`. Preserve existing work. Use the current Composer scripts
   and installed dependencies rather than copying version numbers from docs.
2. Run from the repository root:

   ```bash
   python3 .agents/skills/sync-bexio-api/scripts/sync.py check
   python3 .agents/skills/sync-bexio-api/scripts/sync.py status --list
   ```

   The collector fetches `https://docs.bexio.com/` once, extracts the embedded
   OpenAPI JSON without a browser, and creates a pending queue. It uses HTTP
   validators on later checks and periodically downloads unconditionally. Read
   [collection.md](references/collection.md) for extraction, diff commands,
   source failures, unusual removals, and changes to the documentation host.
3. On the first run, reconcile the entire current contract with the bundled
   `docs/bexio-api-docs.md`, README, implementation, and tests. An initial snapshot
   records observation only: it proves neither historical changes nor client
   compatibility. On later runs, inspect every pending item, including unresolved
   work from older runs and items reopened because their implementation changed.
   An unchanged upstream response does not clear pending work.

## Reconcile and implement

4. Group pending items by affected resource or shared behavior. Read targeted
   `show` / `diff` output rather than the entire page or specification. Account for
   every changed operation, component, and guide section. Follow shared schemas
   to their consumers; compare method, version, path, scope, parameters, request
   bodies, response fields, types, nullability, enums, errors, pagination, limits,
   and lifecycle prerequisites. Changelog entries help explain a change; hashes
   of the full contract detect silent edits and backdated entries too.
5. Cross-check against actual requests, DTOs, payload serializers, query builders,
   enums, auth/config, and public documentation. A README checkmark proves only
   endpoint coverage. Distinguish a real behavior change from a prose/example
   correction, an already implemented capability, and a documentation/API
   disagreement. Include new endpoints/resources in the default scope. Prioritize
   breaking behavior, shared dependencies, and deprecation deadlines, then
   additive capabilities and corrections; do not drop lower-priority items.
6. Implement coherent resource batches using neighboring package patterns. Read
   [implementation.md](references/implementation.md) when changing the client;
   it supplies the contract review and verification gates. Retain supported public
   interfaces where possible. For removals or conflicts with a verified live
   caveat, gather endpoint-specific evidence before deleting behavior. Keep
   ambiguous or unverifiable work pending with its evidence and next action while
   continuing independent changes.
7. Keep the README coverage rows, relevant bundled reference sections, public
   `docs/resources/` guides, and consumer Boost skill aligned where affected.
   Record source URLs and verification dates in the run report. Update `AGENTS.md`
   only for durable repository-wide lessons; keep local explanations near code.

## Verify and checkpoint

8. Run meaningful focused tests, required live API coverage, and type checks for
   changed PHP. Broaden to the suite when shared behavior changes. Observe the
   repository's mock-only revocation exception and disposable-fixture rules.
   A skipped or failed required live flow is pending verification, not success.
9. Read [checkpoints.md](references/checkpoints.md) before recording dispositions.
   Resolve items only after their implementation and required verification are
   complete, or after documenting evidence that no implementation is necessary.
   Use the helper's `record` and `finish` commands; retain the state, compressed
   snapshots, and run reports with the work. Partial/discovery runs retain pending
   items. A full reconciliation uses `check --reconcile`; `--force` only refreshes
   the download.
10. Report the official source, last check, implemented changes, validation,
    unresolved items, and state/report paths. Say whether the client is fully
    synchronized or the run is partial. Commit, push, publication, external
    messages, and scheduling follow the user's existing authorization; this
    skill does not silently create any of them.

Completion means every item in scope has an evidenced disposition, required
checks passed, documentation matches behavior, and the checkpoint reflects the
actual result. Work outside a narrowed scope remains pending for a later run.
