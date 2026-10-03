# Durable review checkpoints

The default state directory is `docs/api-sync/`, relative to the repository root.
Use `--state-dir /tmp/...` **before the subcommand** for collector experiments.
Experiment state is not an implementation checkpoint. No initial timestamp or
successful baseline is shipped with the skill; the first actual run creates it.

## State and ownership

- `state.json` is the authoritative ledger: source/version, latest attempt, last
  successful collection, current fingerprints, reviewed per-item fingerprints,
  and pending items with evidence/next actions.
- `snapshots/<sha256>.json.gz` holds canonical public OpenAPI content. Names are
  hashes of decompressed canonical JSON; readers verify integrity. Retain snapshots
  referenced by the ledger or run records. Do not store credentials or live
  customer responses here.
- `runs/<run-id>.json` records collection metrics and dispositions. `finish` also
  generates `runs/<run-id>.md` with results, checks, and unresolved work.
- `.lock` serializes commands. Atomic file replacement publishes state only after
  snapshot writes. The OS releases the lock if a process exits. A run ID guard
  prevents an agent from recording decisions against a newer concurrent check.

Retain state, snapshots, and reports in version control with the corresponding
implementation when a commit is authorized; keep locks and temporary files
ignored. Copying only the ledger loses the evidence needed for later diffs.
Do not replace corrupt/missing state with a success-shaped empty object. Restore
from repository history or explicitly reconcile anew, preserving unresolved work.

`last_checked_at` proves that the official source was collected and indexed.
`last_successful_run` advances only after `finish` finds no pending work. On a
partial or failed run, the previous success remains a historical checkpoint,
not a claim that current work is complete. The report/status of the latest run
always takes precedence for the current result.

## Record decisions

After implementation and verification, write a temporary JSON array. Each entry
may list related keys sharing the same evidence. Use actual exact keys, files,
commands, and results from this run; this example illustrates the format only:

```json
[
  {
    "keys": ["GET /2.0/contact"],
    "outcome": "already-current",
    "reason": "Compared request pagination and Contact response fields with the operation contract; no behavior change required.",
    "files": [
      "src/Resources/Contacts/Contacts/Requests/GetContactsRequest.php",
      "src/Resources/Contacts/Contacts/Contact.php"
    ],
    "checks": ["Record the actual focused command and result here when executed"]
  }
]
```

Apply it using the run ID from `check` or `status`:

```bash
python3 .agents/skills/sync-bexio-api/scripts/sync.py record --run RUN_ID --decisions /tmp/bexio-decisions.json
python3 .agents/skills/sync-bexio-api/scripts/sync.py finish --run RUN_ID
```

Outcomes:

| Outcome | Required evidence |
| --- | --- |
| `implemented` | Supporting files, actual passing validation, and why behavior now matches the source. Required live coverage must have run successfully. |
| `already-current` | Existing implementation files and a concrete comparison showing compatibility. A coverage checkmark or a passing unrelated test is insufficient. |
| `docs-only` | Explain why the change does not alter behavior; reference any updated documentation files. |
| `not-applicable` | Explain why this item cannot affect this package, such as a schema with no public operation or Redoc metadata. A newly documented API or deferred work is not automatically inapplicable. |

The helper checks structural requirements; it cannot certify the truth of a
reason or test result. The agent must review them. Do not resolve whole domains
using boilerplate assertions or mark work done merely to advance the checkpoint.
Different code paths/contracts require their own supporting evidence even when
recorded in the same batch.

For implementation decisions, include the actual source and meaningful tests in
`files`. Their content hashes are checked on later runs and at `finish`, reopening
items when a change was reverted, files disappeared, or branch content differs.
Include relevant docs for documentation decisions. Finish edits and validation
before recording a batch; if subsequent edits change recorded evidence, review
and record the reopened items. Avoid attaching unrelated/global files to every
decision, which would cause unnecessary repeated review.

## Partial runs and resumption

For blocked, ambiguous, out-of-scope, or unverified work, retain the pending entry:

```bash
python3 .agents/skills/sync-bexio-api/scripts/sync.py note 'GET /2.0/contact' --run RUN_ID --text 'Evidence: ... Next action: ...'
python3 .agents/skills/sync-bexio-api/scripts/sync.py finish --run RUN_ID
```

`finish` reports `partial` while any pending entries remain. Running it does not
force completion. A discovery-only run may document compatibility/no-impact
decisions established by inspection, but changes requiring implementation stay
pending. Narrowed runs leave the rest of the queue pending. Resume with `check`;
HTTP 304 keeps pending work, notes, and the old success checkpoint intact.

If upstream changes again before an item is finished, compare the new target
against its last reviewed snapshot. Old notes retain their target fingerprint
so the agent can tell whether they still apply. Unreviewed items that disappear
remain queued for disposition. A run that never reached `finish` stays visibly
unfinished in its run record; the next run resumes from the ledger.

To reassess every contract against the present implementation, use
`check --reconcile`. To bypass HTTP caching alone, use `check --force`. Neither
command erases decisions, old snapshots, notes, or the historical success marker.
