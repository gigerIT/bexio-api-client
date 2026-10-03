# Collect the official documentation

## Fast path

Use the bundled Python 3.10+ standard-library collector. The official
[one-page reference](https://docs.bexio.com/) embeds an OpenAPI document at
`__redoc_state.spec.data`. Extract this JSON with `JSONDecoder.raw_decode`; never
execute the page's JavaScript. This avoids a browser, a DOM conversion, rendering
assets, duplicated HTML examples, and placing the whole page in model context.

The collector does one conditional GET per check, using ETag or Last-Modified.
HTTP 304 reuses the verified local snapshot; a missing cached snapshot forces a
download. An unconditional download at least every 30 days checks for stale
validators. `check --force` requests one immediately. Gzip is requested when the
server supports it; deterministic compressed JSON snapshots reduce storage even
when the server sends uncompressed HTML. The JSON summary includes transfer size,
snapshot size, operation count, and elapsed collection time.

Canonical JSON ignores object-key order and pretty-printing. Descriptions,
examples, constraints, enum values, and array order remain in the comparison.
Review cosmetic changes explicitly rather than stripping potentially meaningful
text. Guide sections are split at Markdown headings outside code fences, so
authentication, search, rate limits, and changelog edits can be read separately.

Operations are identified by HTTP method and versioned path, not operation ID.
Their fingerprints include path parameters, inherited server/security settings,
security scheme definitions, and transitive local `$ref` dependencies, including
cycles. Components also have their own review items. The current Redoc export
inlines most schemas; edits to these copies still change the affected operation.
Empty path stubs and `x-alias` metadata do not prove an endpoint exists: inspect
`meta/path-stubs` as documentation metadata, never generate requests from it.

## Read only the affected material

Run these from the package root; keys are exact strings from `status --list`:

```bash
python3 .agents/skills/sync-bexio-api/scripts/sync.py status --list --contains payroll
python3 .agents/skills/sync-bexio-api/scripts/sync.py show 'guide/Changelog'
python3 .agents/skills/sync-bexio-api/scripts/sync.py diff 'GET /2.0/contact'
python3 .agents/skills/sync-bexio-api/scripts/sync.py show 'GET /2.0/contact' --before
```

`diff` compares the reviewed snapshot with the latest observation. For an item
never reviewed, it uses the snapshot preceding discovery if available. First-run
items therefore show the whole current item: compare it against local code and
bundled docs, rather than calling it a newly introduced API capability. A pending
item whose source returns to its old content still needs a disposition.

Use operation `operationId` values to link evidence to
`https://docs.bexio.com/#operation/<operationId>`. Guide anchors use
`https://docs.bexio.com/#section/Changelog` and corresponding section paths.
Check actual anchors when citing a newly encountered section. The official
developer portal may supply linked migration guidance; search/Context7 can aid
discovery, but their indexes are not the incremental baseline.

## Failures and suspicious changes

A failed fetch or parse records a failed attempt while preserving the previous
observed snapshot, successful checkpoint, and unresolved queue. Inspect the cause;
retry transient network/429/5xx failures within a bounded attempt count and honor
Retry-After. Persistent source failure leaves the run incomplete. Do not turn an
error page or stale local docs into a current upstream snapshot.

If extraction, reference resolution, or heading parsing fails, inspect the raw
public response in a temporary file. If the site moved to a standalone spec or a
different Redoc bootstrap, verify the official source, adapt the collector and
its tests, and preserve/migrate the existing ledger. Browser/network inspection
is a fallback for changed publication formats, not the regular collection path.
External `$ref` URLs and referenced path objects currently fail explicitly;
implement verified collection support if upstream introduces them.

The collector rejects a disappearance of more than five operations and more
than 20% of the previous operation inventory. Compare a fresh unconditional
fetch, the official changelog, and the rendered endpoint sections before using
`check --force --accept-large-removal`. This flag acknowledges source completeness;
it does not authorize deleting client APIs. Investigate individual removals too:
an empty path stub, deprecation flag, or documentation omission is not proof that
the live API was withdrawn.

After modifying extraction/index semantics, run the helper tests and a collection
in a temporary `--state-dir`. Use `check --reconcile` on the real ledger when the
new collector covers material the old one could have missed. Preserve old
snapshots; deliberately migrate the state version for incompatible formats.

```bash
PYTHONDONTWRITEBYTECODE=1 python3 -m unittest discover -s .agents/skills/sync-bexio-api/scripts -p 'test_*.py' -v
python3 .agents/skills/sync-bexio-api/scripts/sync.py --state-dir /tmp/bexio-sync-check check
```

The tests use small synthetic contracts and temporary state directories. The
second command fetches only public documentation; it does not call the Bexio API.
