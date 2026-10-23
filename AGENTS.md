# Bexio API Client

Laravel package for Bexio API. Uses `saloonphp/saloon` for HTTP connectors/requests, `spatie/laravel-data` for resource DTOs.

## Project Snapshot

- Package: `gigerit/bexio-api-client`
- Runtime: PHP `^8.2`, `illuminate/support` `^10|^11|^12|^13`
- Main entry points:
  - `src/BexioClient.php`: Saloon connector for `https://api.bexio.com`
  - `src/BexioAuth.php`: OAuth connector for `https://auth.bexio.com/realms/bexio/protocol/openid-connect`
  - `src/BexioServiceProvider.php`: container binding, config merge, config publish
  - `src/Facades/Bexio.php`: Laravel facade
- Composer auto-discovers `Bexio\BexioServiceProvider` and `Bexio` facade alias.

## Repository Layout

- `src/`: package source
- `src/Resources/`: API resources by domain: `Accounting`, `Banking`, `Contacts`, `Files`, `Items`, `Other`, `Projects`, `Purchase`, `Sales`
- `config/bexio.php`: published package config
- `tests/`: Pest + Orchestra Testbench suite
- `docs/resources/`: segmented public usage guides by domain/resource
- `docs/CONTACTS.md`: legacy landing page pointing to segmented contacts guides
- `docs/bexio-api-docs.md`: bundled Bexio reference
- `README.md`: installation, auth, examples, resource coverage matrix

## Agent skills

### Upstream API synchronization

Use [sync-bexio-api](.agents/skills/sync-bexio-api/SKILL.md) to check official API
documentation updates and implement client changes. It extracts the embedded
OpenAPI contract and keeps incremental review checkpoints in `docs/api-sync/`.

### Issue tracker

Issues are tracked in this repository's GitHub Issues. See `docs/agents/issue-tracker.md`.

### Triage labels

Triage uses the five canonical label names. See `docs/agents/triage-labels.md`.

### Domain docs

Domain documentation uses the single-context layout. See `docs/agents/domain.md`.

## API Docs

- mcp: context7 `bexio api`
- Local: `docs/bexio-api-docs.md`
- `README.md` is source of truth for documented endpoint coverage. Its `## Available Resources` tables list each bundled-doc endpoint and implementation status. Check there first for endpoint gaps, new resource planning, or existing coverage.

## Core Architecture

### `BexioClient`

- Extends `Saloon\Http\Connector`.
- Accepts token string, Saloon `Authenticator`, or `null`.
- Uses `AcceptsJson` and `AlwaysThrowOnErrors`.
- `testAccount()` resolves credentials: `BEXIO_ACCESS_TOKEN`, then `TEST_API_KEY`, then `config('bexio.access_token')`.

### `BexioAuth`

- OAuth authorization-code connector.
- Uses Saloon `AuthorizationCodeGrant` trait for authorize, token, user endpoints.
- `revokeToken()` posts form data to `/revoke`, validates only client ID/secret, applies the configured OAuth request modifier, and throws on non-success responses.
- Keep revocation tests mock-only so the shared OAuth credentials/session are never invalidated; assert the exact form body and both access/refresh token hints.
- README has current redirect/callback example flow.

### `BexioServiceProvider`

- Merges `config/bexio.php`.
- Registers `BexioClient` singleton and aliases it to `bexio`.
- Auth resolution order:
  1. `config('bexio.access_token')`
  2. `config('bexio.oauth.access_token')`
  3. `null` when neither set
- Publishes config with `php artisan vendor:publish --tag=bexio-config`.

## Resource Model Pattern

All API DTOs extend `src/Resources/Resource.php`, which extends `Spatie\LaravelData\Data`.

### Base Resource Behavior

- `Resource::useClient($client)` creates instance without constructor, attaches client.
- `attachClient()` stores client for instance methods.
- Shared ops: `all()`, `find()`, `refresh()`, `create()`, `update()`, `save()`, `delete()`, `query()`.
- Resources declare request classes through constants: `INDEX_REQUEST`, `SHOW_REQUEST`, `CREATE_REQUEST`, `UPDATE_REQUEST`, `DELETE_REQUEST`; optional `QUERY_BUILDER`.
- Missing required request constant for an operation throws at runtime.

### Constructor and Payload Conventions

- Constructor-promoted public properties = create/update payload fields.
- Response-only fields usually normal public properties outside constructor.
- Create/update requests usually call `$resource->except(...)->toArray()` to strip response-only fields before JSON.
- Preserve split. Do not put response-only API fields in constructor-promoted properties unless valid create/update payload fields.
- Sales documents and item positions enforce the split: `toWritePayload(WriteOperation, ?KbDocumentType)` from `src/Resources/Sales/Concerns/BuildsWritePayloads.php` writes constructor-promoted properties, skips `#[ResponseOnly]`, and adds or narrows properties marked `#[Writable(on:, omitNull:, exceptFor:)]`. Record each live-verified write quirk as an attribute with a one-line comment on its property, covered by `tests/Unit/Resources/Sales/WritePayloadTest.php` and `tests/Resources/Sales/WritePayloadRequestsTest.php`. Rationale: `docs/adr/0001-write-payloads-from-constructor-fields.md`.

### Request Class Pattern

- Requests live beside resource in `Requests/`.
- Common names: `GetXRequest`, `CreateXRequest`, `UpdateXRequest`, `DeleteXRequest`, `SearchXRequest`.
- Search naming varies: `SearchContactRequest`, `SearchItemsRequest`, `SearchBusinessActivitiesRequest`. Match local convention; do not normalize unrelated files.
- Search requests should extend `Bexio\Support\Requests\SearchRequest` for shared POST JSON `searchClauses` behavior. Keep per-request constructors only for route context, query parameters, validation, or response normalization.
- Each request owns `resolveEndpoint()` and `createDtoFromResponse()`.
- JSON body requests implement `HasBody` and use `HasJsonBody`.

### Query Builder Pattern

- Base builders: `src/Support/QueryBuilder.php`, `src/Support/SearchableQueryBuilder.php`.
- Shared fluent methods: `limit()`, `offset()`, `forPage()`, `orderBy()`, `when()`, `get()`, `first()`.
- `SearchableQueryBuilder` also has `where()`, `whereIn()`, `whereNull()`, `whereNotNull()`, `whereBetween()`.
- Public collection retrieval is `get()` only. Older `search()` builder API removed in current major-version work.
- Searchable builders auto-switch from resource `INDEX_REQUEST` to dedicated `Search*Request` after any where-clause.
- Resource-specific builders stay thin: domain sugar or endpoint context only, e.g. `withArchived()`, `forContact()`, invoice status/date helpers.
- Sales document builders for invoices, orders, and quotes share `src/Resources/Sales/Concerns/BuildsSalesDocumentQueries.php`; keep concrete typed public helpers and override only endpoint-specific field names such as quote `is_valid_until`.
- `QueryBuilder` still instantiates requests from constructor args. Resource-specific builders may override `indexRequestArguments()`, `searchRequestArguments()`, or `searchRequestQueryParameters()` when request constructor names or route context differ from fluent state.
- Unmatched builder parameters (not bound to request constructor args) are forwarded onto the Saloon request query string. Zero-constructor and partial-constructor index requests therefore still receive `limit`/`offset`/`order_by` and resource-specific filters such as Tax `scope`/`date`/`types`.
- v4 purchase list builders (`Bill`, `Expense`, `OutgoingPayment`) use `src/Resources/Purchase/Concerns/BuildsPageBasedListQueries.php`: `forPage()`/`orderBy()` emit `page`/`limit`/`order`/`sort`; `offset()` throws. Do not assume base `offset`/`order_by` on those resources.
- Banking `PaymentQueryBuilder` uses 0-based `page` + `perPage` (`per-page`); `limit()` remaps to `perPage()`, while `offset()`/`orderBy()` throw.

### Search DTOs

- Shared operator enum: `src/Support/Data/SearchCriteria.php`.
- Shared base clause DTO: `src/Support/Data/SearchWhereClause.php`.
- Many resources have resource-specific clause classes: `ContactSearchWhereClause`, `ItemSearchWhereClause`, `ProjectSearchWhereClause`.
- Pattern varies: some extend shared `SearchWhereClause`, some define own `Data`. Follow resource-local pattern.

### Enum Usage

- Prefer package enums over raw API IDs or strings whenever an enum exists, especially for statuses and typed values in consuming projects.
- Use sales status enums such as `InvoiceStatus`, `OrderStatus`, and `QuoteStatus` with query-builder `status()`/`statusIn()` helpers instead of numeric `kb_item_status_id` values.
- Use purchase/status and typed-value enums such as `BillStatus`, `PurchaseOrderStatus`, `ContactType`, `ItemPositionType`, and `SearchCriteria` instead of memorized API constants.
- Fall back to raw IDs or strings only when the package has no enum for that API value yet or the method explicitly supports custom values.

## Important Resource-Specific Caveats

### Invoice payload normalization

- `src/Resources/Sales/Invoices/Invoice.php` has custom API payload helpers:
  - `createFromApiPayload()` backfills `invoice_date` from `is_valid_from` when needed.
  - `collectFromApiPayload()` maps arrays through same normalization.
  - `toApi()`/`toUpdateApi()` are deprecated wrappers around `toWritePayload()`. Invoice, order, and quote creates all reject `document_nr` while automatic numbering is on, and all three reject a null `mwst_is_net` on create and update, so it is written only when set.
- Keep helpers synced with invoice response payloads and `tests/Unit/Resources/Sales/Invoices/InvoiceDataTest.php`.

### Invoice query support

- `src/Resources/Sales/Invoices/InvoiceQueryBuilder.php` and `src/Resources/Sales/Orders/OrderQueryBuilder.php` consume `SearchableQueryBuilder` for sales documents.
- Invoice filtering uses `POST /2.0/kb_invoice/search` via `src/Resources/Sales/Invoices/Requests/SearchInvoicesRequest.php`.
- Live API rejects literal `invoice_date` search field on `/2.0/kb_invoice/search`; use `validFrom()`, `validTo()`, or `validBetween()` against normalized `invoice_date`/validity dates.
- Preferred helpers: `status()`, `statusIn()`, `validFrom()`, `validTo()`, `validBetween()`.

### Order query support

- Unfiltered order queries: `GET /2.0/kb_order` with `order_by`, `limit`, `offset` via `src/Resources/Sales/Orders/Requests/GetOrdersRequest.php`.
- Order filtering: `POST /2.0/kb_order/search` via `src/Resources/Sales/Orders/Requests/SearchOrdersRequest.php`.
- `src/Resources/Sales/Orders/OrderQueryBuilder.php` mirrors invoice builder: `status()`, `statusIn()`, `validFrom()`, `validTo()`, `validBetween()`.
- Keep `Order::$kb_item_status_id` as `int`. `OrderStatus` maps documented states: pending `5`, done `6`, partial `15`, canceled `21`.
- Live order create and update reject `is_valid_to` and `reference` but accept and persist `mwst_is_net` and write-only `pr_project_id` (read back as `project_id`); `Order.php` attributes encode this.
- Sales documents with `ItemPositionArticle` or `ItemPositionSubposition` are created empty, then all positions are added in order through item-position endpoints (`CreatesSalesDocumentsWithDeferredPositions`); positions with a `parent_id` throw before sending. Bexio rejects inline subpositions. A 2026-10-23 live probe accepted inline article positions with `article_id` on all three document types, so the original article rejection did not reproduce; keep deferring articles until a live test proves inline article creation through the package.

### Other task reminder payloads

- Task create/update payloads map `has_reminder` to API field `have_remember`.
- Live task update rejects `have_remember` unless both `remember_type_id` and `remember_time_id` are submitted. Omit `have_remember` on update when reminder type/time are absent.
- Live task responses use string booleans (`"false"` / `"true"`) in `has_reminder`, while the docs describe boolean `have_remember`. Normalize both inputs before DTO boolean casting; a plain cast turns `"false"` into `true`.
- Country write endpoints require a valid `iso3166_alpha2`; update tests should preserve/send it even if the create response does not hydrate it.

### Quote query support

- Unfiltered quote queries: `GET /2.0/kb_offer` with `order_by`, `limit`, `offset` via `src/Resources/Sales/Quotes/Requests/GetQuotesRequest.php`.
- Quote filtering: `POST /2.0/kb_offer/search` via `src/Resources/Sales/Quotes/Requests/SearchQuotesRequest.php`.
- `src/Resources/Sales/Quotes/QuoteQueryBuilder.php` mirrors order builder: `status()`, `statusIn()`, `validFrom()`, `validTo()`, `validBetween()`.
- Live API matches quote validity on `is_valid_until`; do not use `is_valid_to` in quote search helpers.
- Quote conversion endpoints (`/2.0/kb_offer/{quote_id}/order` and `/2.0/kb_offer/{quote_id}/invoice`) require the quote to be accepted first. Disposable live tests can issue and accept a quote as setup; quote lifecycle actions remain separate endpoint work unless explicitly in scope.
- Sales document conversion helpers synthesize explicit source-position payloads when callers omit positions. Live API rejects empty or null `positions` payloads for package-created source documents even though the docs describe the positions array as optional.

### Accounting search support

- Account filtering uses `POST /2.0/accounts/search`. Docs and live payloads use `fibu_account_group_id`; `Account` maps this to public `account_group_id`.
- Account group docs/live payloads use `parent_fibu_account_group_id`; `AccountGroup` maps this to public `parent_id`.
- Manual entries do not have a documented/live show endpoint. `ManualEntry::find()` and `refresh()` intentionally throw instead of calling `GET /3.0/accounting/manual_entries/{id}`.
- Calendar year filtering uses `POST /3.0/accounting/calendar_years/search`. Search clauses use API fields `start` and `end`, though `CalendarYear` DTO keeps `date_start` and `date_end`.
- Calendar and business year API responses use `start` and `end`; DTOs expose these as `date_start` and `date_end` via input mapping.
- Calendar year docs: end-date equality searches may need full timestamp; prefer `like` for end date unless exact API datetime known.

### Invoice reminders need invoice context

- `src/Resources/Sales/Invoices/InvoiceReminders/InvoiceReminder.php` overrides `find()` and `delete()` because endpoint needs both `kb_invoice_id` and reminder id.
- `src/Resources/Sales/Invoices/InvoiceReminders/InvoiceReminderQueryBuilder.php` adds `forInvoice(int $invoiceId)` and custom request instantiation.
- Invoice reminder listing, creation, search live under `/2.0/kb_invoice/{invoice_id}/kb_reminder`.

### Additional addresses need contact context

- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddress.php` overrides `find()` and `delete()` because endpoint needs both `contact_id` and address id.
- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddressQueryBuilder.php` adds `forContact(int $contactId)` and custom request instantiation.
- Do not assume base `Resource::find()` works for nested/contact-scoped resources.

### Banking payments

- V4 payment instance refresh/delete/save uses `uuid` when present. Create/update bodies serialize `amount` as a JSON number, including hydrated string amounts.
- Live v4 updates require `type` even though the public update schema omits it. QR payloads omit the IBAN-only `allowance`; QR reference and additional information remain writable.

- The live `/4.0/banking/payments` index may return payment UUIDs that immediately 404 on `GET /4.0/banking/payments/{payment_id}` in the shared test account.
- Read-only tests for `Payment::find()` should try a small indexed page and skip only when no indexed payment is retrievable, instead of assuming the first payment can be shown.

### Office deep links

- `src/Support/Concerns/HasOfficeLink.php` builds Office URLs from `SHOW_URL` and `Resource::OFFICE_BASE_URL`.
- Resources using trait must provide matching `SHOW_URL` constant.

### Deliveries have no nested comment/position APIs

- Bexio comment and item-position endpoints only accept `kb_offer` / `kb_order` / `kb_invoice`.
- `Delivery` must not set `DOCUMENT_TYPE` to `KbDocumentType::ORDER` or use `HasComments` / `HasPositions` / `HasSubItemPositions`.
- Embedded delivery `positions` hydrate from show/index responses via `ItemPositionCast` only.

### Polymorphic item positions

- `src/Resources/Sales/ItemPositions/ItemPositionCast.php` maps item-position payloads by `type` to concrete DTO classes.
- Supported types asserted in `tests/Unit/ItemPositionCastTest.php`.
- Position write rules are attributes on `ItemPosition` (`type` inline only, `parent_id` on dedicated create only, `is_optional` never on invoices) and `ItemPositionArticle` (`article_id` on create and inline only). The create and update requests send `toWritePayload()` unchanged.
- Live item-position widget schemas are stricter than the docs and may reject fields shown on documented create/update samples.
- `ItemPositionArticle` has split write semantics: dedicated create accepts `article_id`, while article-position update rejects `article_id` and a null `parent_id` and silently ignores an integer `parent_id`. Do not reuse shared item-position payload assumptions without type-specific tests.
- Any change touching item-position create/update serialization must include a mocked Saloon body assertion for the exact endpoint (`tests/Unit/Resources/Sales/ItemPositionMetadataTest.php`) and a live disposable sales-document test for the affected create/update flow. Creation-only coverage is not enough when update payloads differ.
- If Bexio adds item position type, update enum, cast, and test together.

- Fetched position totals, tax values, quantities, numbering and group totals are response metadata; they are never written because they are not constructor-promoted. Keep non-null parent IDs for supported nested creates.
- Inline positions in a sales-document create require `type`, while a dedicated create rejects it (verified on custom). Inline positions reject any `parent_id` (even `null`), `id`, and fetched fields such as `internal_pos`, `pos`, `position_total`, `tax_value`, and `unit_name`; `KbPositionSubposition` is not supported inline. Document updates reject `positions`.
- Quotes and orders accept `is_optional` on dedicated create and update for every position type and persist it for all but discount, whose responses omit it; inline custom positions accept it too. Invoices reject it on create, update, and inline.

### Item write payloads

- Live `/2.0/article` create/update rejects `article_type_id` in write bodies even though bundled docs list it. Omit `article_type_id` and route `id` from item write payloads; keep live create/update/delete coverage because read responses may still hydrate `article_type_id` and can return it as `null`.

### Purchase write payloads

- Bill writes distinguish create/update child rows: preserve line-item/discount IDs on update, omit them on create, and never write calculated line `tax_calc`. Use `Bill::toApiPayload()` for JSON bodies.
- Bills and purchase orders can be reused from hydrated DTOs that include response-only fields. Create/update requests should use resource `toApi()` helpers instead of raw `toArray()`, and unit tests should assert hydrated write bodies omit IDs, document numbers, status, totals, timestamps, and embedded response objects.

### Endpoint versions are mixed

- Codebase uses `/2.0/...`, `/3.0/...`, `/4.0/...` by resource.
- Do not assume one version package-wide; check neighboring request classes.
- Milestone updates use `PATCH /3.0/projects/{project_id}/milestones/{milestone_id}`. The official docs still list POST, which returns 404 for an existing milestone; disposable create/update/show/delete verified PATCH.

## Authentication and Config

- Config: `config/bexio.php`.
- Auth modes:
  - Personal access token via `BEXIO_ACCESS_TOKEN`
  - OAuth credentials via `BEXIO_CLIENT_ID`, `BEXIO_CLIENT_SECRET`, `BEXIO_REDIRECT_URI`
- Config includes default OAuth scopes and optional stored OAuth access/refresh tokens.
- `.env.example` documents expected env vars.

## Testing Workflow

- Working BEXIO_ACCESS_TOKEN always provided via .env locally and CI.
- Stack: Pest v3 + Orchestra Testbench.
- Main files: `tests/Pest.php`, `tests/TestCase.php`, `phpunit.xml`.
- Commands: `composer test`, `composer test:types`.

### Test helpers

- `tests/Pest.php` helpers:
  - `testClient()` for live API via `BexioClient::testAccount()`
  - `testMockClient()` for Saloon mock responses
  - cached helpers: `testSaleTax()`, `testSalesAccount()`, `testAccountId()`
- Resource coverage should use real API requests. API key exists locally and CI. New API feature/resource tests should use `testClient()` and real Bexio endpoints, not mocks.
- `tests/Resources/LiveApiOperationCoverageTest.php` guards exposed `SHOW_REQUEST` operations: any resource advertising `find()` must have live resource-level show coverage and a matching README coverage-table row.
- Keep mocks/fixtures for narrow unit tests only: DTO, casting, request construction. Mocked tests alone are insufficient for new API features.
- Existing live API patterns:
  - create/update/delete disposable records as in `tests/Resources/Contacts/Contacts/ContactRequestsTest.php`, `tests/Resources/Purchase/Bills/BillRequestsTest.php`, `tests/Resources/Sales/Invoices/InvoiceRequestsTest.php`
  - read/search/query-builder tests fetch small live datasets, skip only when remote account lacks data, as in `tests/Resources/Projects/Projects/ProjectRequestsTest.php`, `tests/Resources/Banking/PaymentRequestsTest.php`
- Parallel live tests share one Bexio account. Do not assert that an unfiltered `orderBy('id', 'desc')` or `first()` result is the record just created by the current test; another worker may create a newer record. Scope the query by unique fixture data when testing a specific record, or assert only stable ordering/type/id invariants.
- For write endpoints, create prerequisite record in test instead of depending on existing account data.
- For read-only/account-data endpoints, fetch small live dataset first; skip only when no compatible remote records.
- One Saloon fixture exists: `tests/Fixtures/Saloon/contacts/contacts/get.json`.

### Test environment behavior

- `tests/TestCase.php` loads `LaravelDataServiceProvider` and `BexioServiceProvider`.
- Test env loads package-root `.env` only when neither `BEXIO_ACCESS_TOKEN` nor `TEST_API_KEY` exists in process env, then sets `config('bexio.access_token')` from those vars.
- Missing credentials are not normal locally/CI. If test cannot run, first assume missing remote fixtures/data, not missing auth.
- Full-account live tests must surface authorization and endpoint errors. For a known trial account, set `BEXIO_TEST_ACCOUNT_PLAN=trial`: only payroll, legacy IBAN/QR writes, and purchase-order writes use `testFullAccountClient()` to skip unavailable access explicitly. Contract tests still run; these skips do not prove live compatibility. Read-only tests may also skip when the account has no compatible data.
- `tests/ArchitectureTest.php` bans debug helpers: `dd`, `dump`, `ray`, `sleep`.

## CI and Release

- Workflow: `.github/workflows/CI.yml`.
- PR CI runs the locked PHP 8.4/8.5 graph, with at most two test workers, using
  `php vendor/bin/pest --configuration=phpunit.offline.xml --parallel --processes=2`.
  This mode clears live account tokens, prevents unfaked Saloon requests and
  rejects missing fixtures instead of recording them. It covers existing unit,
  mocked-auth, architecture and endpoint-coverage contracts; it does not qualify
  live API behavior or PHP/Laravel combinations outside the current locked graph.
- PR jobs inherit a read-only token. Live tests retain their main-push path;
  only the main-push Release job receives the existing write permissions.
- Pushes to `main`:
  - `Test` job runs on PHP 8.4.
  - Runs `php vendor/bin/pest --colors=always -v --parallel --processes=6`.
  - Exposes same secret as `BEXIO_ACCESS_TOKEN` and `TEST_API_KEY`.
- Release automation installs `release-please@17.3.0` and runs
  `.github/scripts/release-please.js` with manifest config in
  `release-please-config.json` and `.release-please-manifest.json`.
  The wrapper patches only Release Please's merge-commit GraphQL query because
  the stock query that requests PR bodies/files fails for this repo. Keep
  commit-file backfilling through REST unless the exact release-please query is
  re-verified against GitHub.
  The config intentionally makes common conventional commit sections visible,
  including `docs` and `ci`, so release PR notes include all repo-maintenance
  commits made between releases.
- Test job skipped for release commits containing `chore(main): release`.
- Dependabot updates Composer and GitHub Actions weekly via `.github/dependabot.yml`.
  It ignores major updates for `googleapis/release-please-action`; keep release automation on v4 until v5 is verified against this workflow.

## Documentation Drift To Watch

- `Contact` uses `titel_id` in `src/Resources/Contacts/Contacts/Contact.php`; some bundled Bexio docs may use `title_id`.
- Some Pest resource tests have copied namespace declarations unrelated to directory. Pest still executes them; do not treat namespaces as authoritative project structure.

## When Adding Or Updating Resources

- Mirror structure:
  1. Resource DTO in resource directory
  2. Request classes in `Requests/`
  3. Optional query builder and search where-clause DTO
  4. Integration/unit tests in matching `tests/Resources/...` or `tests/Unit/...`
- Reuse base `Resource` helpers unless endpoint needs route context, custom normalization, or custom request assembly.
- Match endpoint versioning and local naming in edited area.
- Keep `README.md` endpoint coverage synced with code changes. When adding/removing/renaming/changing API endpoint implementation, update relevant row in `## Available Resources` same task.
- Every new API-facing feature ships with real API tests in `tests/Resources/...`, following existing live-request style.
- If adding response-only fields, update outgoing payload filtering.
- If adding new pattern or project caveat, update this file same task.

## Documentation Placement and Maintenance

**When to document**
Update/add docs when task introduces verified changes, reveals missing context, or uncovers useful gaps. Use verified current-task facts only; no speculation.

**Where to document**
Decision rule before writing:

1. Global, reusable, task-agnostic guidance -> `AGENTS.md`
2. File/function/implementation-scoped insight -> code comment at relevant location
3. Public package usage examples/resource-specific integration notes -> `docs/resources/<domain>/<resource>.md`
4. AI-agent integration guidance for consumers -> keep Laravel Boost skill resource
   `resources/boost/skills/bexio-api-client-development/SKILL.md` in sync when the
   change is useful for agents integrating this package
5. If both apply -> global rule in `AGENTS.md`, local detail in code comment

Default to narrowest correct target.

**Quality standard**
Keep `AGENTS.md` high-signal and durable. Summarize, deduplicate, prune stale/overly narrow entries.

**Completion check**
Before final: confirm needed `AGENTS.md` updates and relevant code comments made, or explicitly verify none needed. Task incomplete until check passes.
