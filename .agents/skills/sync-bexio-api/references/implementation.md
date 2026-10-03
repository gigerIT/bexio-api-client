# Apply an upstream contract change

Read the current repository `AGENTS.md` for live API exceptions and architecture.
It owns those details; this checklist connects an upstream diff to client work.

## Map the whole impact

| Upstream change | Inspect and update where needed |
| --- | --- |
| Endpoint/method/version or new resource | Request class, resource constants/helpers, route context, query builder, README row, public usage guide, live feature coverage. Empty path stubs are not operations. |
| Request field, requiredness, nullability or enum | Constructor/payload split, create **and** update serializers, casts/enums, validation, hydrated DTO reuse, exact outgoing body tests. |
| Response field/type, union or envelope | DTO hydration, response-only properties, casts, collection normalization, public types, and write-body filtering. |
| Search, pagination, ordering or defaults | Shared builder argument forwarding and resource overrides, endpoint-specific parameter names, limit boundaries, live query behavior. |
| Scope, OAuth, headers, errors or rate limits | Connector/auth/config, scope enums and mappings, relevant helpers, docs, mock tests for auth/session-sensitive flows. |
| Deprecated/removed behavior | Replacement and migration path, existing public callers, compatibility implications, verified live availability. Deprecation is not immediate deletion. |
| Prose/example or changelog-only edit | Verify whether it reveals existing contract drift before recording it as documentation-only. |

Find consumers of changed components even if the component itself has no PHP
counterpart. The collector follows ordinary `$ref` dependencies; textual cross
references, duplicated schemas, inline sales positions, and shared client helpers
still require semantic inspection. A global auth/search/rate-limit change can
affect operations whose own endpoint text is unchanged.

Maintain additive compatibility where the API allows it. Keep existing public
property names and map upstream wire names at the boundary. Treat required-field
or endpoint replacements as migrations; add a replacement before retiring a
supported path when practical. A breaking public change needs a concrete reason
and migration notes. Ask only for a product/versioning decision that cannot be
resolved from the repository or existing user instructions, while continuing
independent updates.

## Verify against reality

Bundled docs are a historical comparison source. The current official contract
is the upstream source, but this repository contains verified live differences.
Preserve those until endpoint-specific mock assertions and disposable live tests
demonstrate the new behavior. Keep the discrepancy, exact source anchor, observed
result, and required follow-up in the pending ledger if evidence is inconclusive.

Use existing `testClient()` patterns and unique disposable fixtures. Cover create
and update separately when schemas differ, and clean up created records even
after assertions fail. Shared-account queries must target unique fixture data
or stable invariants. Exercise reads with small pages and the documented skip
rules; do not disguise authorization/schema failures as missing remote data.

Run narrow Saloon assertions for exact method, path, query/body serialization,
DTO hydration, and response-only filtering where those changed. They complement
the repository's required live resource tests. New API behavior is not complete
on mocks alone. Item-position write changes need both the exact endpoint/body
unit test and the affected live create/update flow. Token revocation remains
mock-only to protect the shared OAuth session. Sending messages or triggering
real customer financial actions requires the user's applicable authorization;
use disposable/non-delivery test patterns and retain unverified actions pending.

Use the current scripts in `composer.json`. For PHP changes, run relevant Pest
files, `composer test:types`, and the architecture/operation coverage checks where
applicable. Run the broader suite for shared connector, Resource, query, or cast
changes; do not run every live endpoint for an unrelated documentation edit.
Record exact commands, pass/fail/skip results, and material limits. Skipped live
coverage that is required to verify a changed flow stays pending, with its reason.

## Keep public guidance current

Update affected sections of `docs/bexio-api-docs.md` from the extracted source,
preserving its useful organization instead of replacing it with rendered HTML.
Keep README endpoint coverage synchronized in the same batch. Put package usage
examples and wire-format caveats in the relevant `docs/resources/` guide. Update
`resources/boost/skills/bexio-api-client-development/SKILL.md` when a change matters
to consuming agents. If editing agent guidance, apply the writing-for-agents
instructions available in the environment. Finish by checking whether durable
`AGENTS.md` guidance or a local code comment is needed and record that outcome.
