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
- `docs/bexio API docs.md`: bundled Bexio reference
- `README.md`: installation, auth, examples, resource coverage matrix

## API Docs

- mcp: context7 `bexio api`
- Local: `docs/bexio API docs.md`
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

### Request Class Pattern

- Requests live beside resource in `Requests/`.
- Common names: `GetXRequest`, `CreateXRequest`, `UpdateXRequest`, `DeleteXRequest`, `SearchXRequest`.
- Search naming varies: `SearchContactRequest`, `SearchItemsRequest`, `SearchBusinessActivitiesRequest`. Match local convention; do not normalize unrelated files.
- Each request owns `resolveEndpoint()` and `createDtoFromResponse()`.
- JSON body requests implement `HasBody` and use `HasJsonBody`.

### Query Builder Pattern

- Base builders: `src/Support/QueryBuilder.php`, `src/Support/SearchableQueryBuilder.php`.
- Shared fluent methods: `limit()`, `offset()`, `forPage()`, `orderBy()`, `when()`, `get()`, `first()`.
- `SearchableQueryBuilder` also has `where()`, `whereIn()`, `whereNull()`, `whereNotNull()`, `whereBetween()`.
- Public collection retrieval is `get()` only. Older `search()` builder API removed in current major-version work.
- Searchable builders auto-switch from resource `INDEX_REQUEST` to dedicated `Search*Request` after any where-clause.
- Resource-specific builders stay thin: domain sugar or endpoint context only, e.g. `withArchived()`, `forContact()`, invoice status/date helpers.
- `QueryBuilder` still instantiates requests from constructor args. Resource-specific builders may override `indexRequestArguments()`, `searchRequestArguments()`, or `searchRequestQueryParameters()` when request constructor names or route context differ from fluent state.

### Search DTOs

- Shared operator enum: `src/Support/Data/SearchCriteria.php`.
- Shared base clause DTO: `src/Support/Data/SearchWhereClause.php`.
- Many resources have resource-specific clause classes: `ContactSearchWhereClause`, `ItemSearchWhereClause`, `ProjectSearchWhereClause`.
- Pattern varies: some extend shared `SearchWhereClause`, some define own `Data`. Follow resource-local pattern.

## Important Resource-Specific Caveats

### Invoice payload normalization

- `src/Resources/Sales/Invoices/Invoice.php` has custom API payload helpers:
  - `createFromApiPayload()` backfills `invoice_date` from `is_valid_from` when needed.
  - `collectFromApiPayload()` maps arrays through same normalization.
  - `toApi()` strips response-only/reporting fields from create payloads, including API-rejected `document_nr` and `mwst_is_net`.
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
- `src/Resources/Sales/Orders/Order.php::toApi()` strips response-only/API-rejected create fields: `taxs`, `mwst_is_net`, `is_valid_to`, `project_id`, `reference`.

### Quote query support

- Unfiltered quote queries: `GET /2.0/kb_offer` with `order_by`, `limit`, `offset` via `src/Resources/Sales/Quotes/Requests/GetQuotesRequest.php`.
- Quote filtering: `POST /2.0/kb_offer/search` via `src/Resources/Sales/Quotes/Requests/SearchQuotesRequest.php`.
- `src/Resources/Sales/Quotes/QuoteQueryBuilder.php` mirrors order builder: `status()`, `statusIn()`, `validFrom()`, `validTo()`, `validBetween()`.
- Live API matches quote validity on `is_valid_until`; do not use `is_valid_to` in quote search helpers.
- Quote conversion endpoints (`/2.0/kb_offer/{quote_id}/order` and `/2.0/kb_offer/{quote_id}/invoice`) require the quote to be accepted first. Disposable live tests can issue and accept a quote as setup; quote lifecycle actions remain separate endpoint work unless explicitly in scope.
- Sales document conversion helpers synthesize explicit source-position payloads when callers omit positions. Live API rejects empty or null `positions` payloads for package-created source documents even though the docs describe the positions array as optional.

### Accounting search support

- Account filtering uses `POST /2.0/accounts/search`. Docs and live payloads use `fibu_account_group_id` as account-group field in search responses.
- Calendar year filtering uses `POST /3.0/accounting/calendar_years/search`. Search clauses use API fields `start` and `end`, though `CalendarYear` DTO keeps `date_start` and `date_end`.
- Calendar year docs: end-date equality searches may need full timestamp; prefer `like` for end date unless exact API datetime known.

### Invoice reminders need invoice context

- `src/Resources/Sales/Invoices/InvoiceReminders/InvoiceReminder.php` overrides `find()` and `delete()` because endpoint needs both `kb_invoice_id` and reminder id.
- `src/Resources/Sales/Invoices/InvoiceReminders/InvoiceReminderQueryBuilder.php` adds `forInvoice(int $invoiceId)` and custom request instantiation.
- Invoice reminder listing, creation, search live under `/2.0/kb_invoice/{invoice_id}/kb_reminder`.

### Additional addresses need contact context

- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddress.php` overrides `find()` and `delete()` because endpoint needs both `contact_id` and address id.
- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddressQueryBuilder.php` adds `forContact(int $contactId)` and custom request instantiation.
- Do not assume base `Resource::find()` works for nested/contact-scoped resources.

### Office deep links

- `src/Support/Concerns/HasOfficeLink.php` builds Office URLs from `SHOW_URL` and `Resource::OFFICE_BASE_URL`.
- Resources using trait must provide matching `SHOW_URL` constant.

### Polymorphic item positions

- `src/Resources/Sales/ItemPositions/ItemPositionCast.php` maps item-position payloads by `type` to concrete DTO classes.
- Supported types asserted in `tests/Unit/ItemPositionCastTest.php`.
- If Bexio adds item position type, update enum, cast, and test together.

### Endpoint versions are mixed

- Codebase uses `/2.0/...`, `/3.0/...`, `/4.0/...` by resource.
- Do not assume one version package-wide; check neighboring request classes.

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
- Keep mocks/fixtures for narrow unit tests only: DTO, casting, request construction. Mocked tests alone are insufficient for new API features.
- Existing live API patterns:
  - create/update/delete disposable records as in `tests/Resources/Contacts/Contacts/ContactRequestsTest.php`, `tests/Resources/Purchase/Bills/BillRequestsTest.php`, `tests/Resources/Sales/Invoices/InvoiceRequestsTest.php`
  - read/search/query-builder tests fetch small live datasets, skip only when remote account lacks data, as in `tests/Resources/Projects/Projects/ProjectRequestsTest.php`, `tests/Resources/Banking/PaymentRequestsTest.php`
- For write endpoints, create prerequisite record in test instead of depending on existing account data.
- For read-only/account-data endpoints, fetch small live dataset first; skip only when no compatible remote records.
- One Saloon fixture exists: `tests/Fixtures/Saloon/contacts/contacts/get.json`.

### Test environment behavior

- `tests/TestCase.php` loads `LaravelDataServiceProvider` and `BexioServiceProvider`.
- Test env loads package-root `.env` only when neither `BEXIO_ACCESS_TOKEN` nor `TEST_API_KEY` exists in process env, then sets `config('bexio.access_token')` from those vars.
- Missing credentials are not normal locally/CI. If test cannot run, first assume missing remote fixtures/data, not missing auth.
- `tests/ArchitectureTest.php` bans debug helpers: `dd`, `dump`, `ray`, `sleep`.

## CI and Release

- Workflow: `.github/workflows/CI.yml`.
- Pushes to `main`:
  - `Test` job runs on PHP 8.4.
  - Runs `php vendor/bin/pest --colors=always -v --parallel --processes=6`.
  - Exposes same secret as `BEXIO_ACCESS_TOKEN` and `TEST_API_KEY`.
- Release automation: `googleapis/release-please-action@v4`, `release-type: php`.
- Test job skipped for release commits containing `chore(main): release`.
- Dependabot updates Composer and GitHub Actions weekly via `.github/dependabot.yml`.

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
4. If both apply -> global rule in `AGENTS.md`, local detail in code comment

Default to narrowest correct target.

**Quality standard**
Keep `AGENTS.md` high-signal and durable. Summarize, deduplicate, prune stale/overly narrow entries.

**Completion check**
Before final: confirm needed `AGENTS.md` updates and relevant code comments made, or explicitly verify none needed. Task incomplete until check passes.
