# Bexio API Client

Laravel package for the Bexio API. The package uses `saloonphp/saloon` for HTTP connectors/requests and `spatie/laravel-data` for resource DTOs.

## Project Snapshot

- Package name: `gigerit/bexio-api-client`
- Runtime requirements: PHP `^8.2`, `illuminate/support` `^10|^11|^12|^13`
- Main entry points:
  - `src/BexioClient.php`: Saloon connector for `https://api.bexio.com`
  - `src/BexioAuth.php`: OAuth connector for `https://auth.bexio.com/realms/bexio/protocol/openid-connect`
  - `src/BexioServiceProvider.php`: container binding, config merge, config publish
  - `src/Facades/Bexio.php`: Laravel facade
- Composer auto-discovers `Bexio\BexioServiceProvider` and the `Bexio` facade alias.

## Repository Layout

- `src/`: package source
- `src/Resources/`: API resources grouped by domain (`Accounting`, `Banking`, `Contacts`, `Files`, `Items`, `Other`, `Projects`, `Purchase`, `Sales`)
- `config/bexio.php`: published package config
- `tests/`: Pest + Orchestra Testbench suite
- `docs/resources/`: segmented public usage guides grouped by domain and resource
- `docs/CONTACTS.md`: legacy landing page that points to the segmented contacts guides
- `docs/bexio API docs.md` and `docs/bexio API documentation.html`: bundled reference material from Bexio
- `README.md`: installation, auth, examples, and resource coverage matrix

## API Docs

- mcp: context7 `bexio api`
- Local: `docs/bexio API docs.md` and `docs/bexio API documentation.html`: bundled reference material from Bexio

## Core Architecture

### `BexioClient`

- Extends `Saloon\Http\Connector`.
- Accepts either a token string, a Saloon `Authenticator`, or `null`.
- Uses `AcceptsJson` and `AlwaysThrowOnErrors`.
- `testAccount()` resolves credentials from `BEXIO_ACCESS_TOKEN`, then `TEST_API_KEY`, then `config('bexio.access_token')`.

### `BexioAuth`

- Separate connector for OAuth authorization-code flow.
- Sets authorize, token, and user endpoints via Saloon's `AuthorizationCodeGrant` trait.
- README contains the current redirect/callback example flow.

### `BexioServiceProvider`

- Merges `config/bexio.php`.
- Registers `BexioClient` as a singleton and aliases it to `bexio`.
- Authentication resolution order is:
  1. `config('bexio.access_token')`
  2. `config('bexio.oauth.access_token')`
  3. `null` if neither is set
- Publishes config with `php artisan vendor:publish --tag=bexio-config`.

## Resource Model Pattern

All API DTOs extend `src/Resources/Resource.php`, which itself extends `Spatie\LaravelData\Data`.

### Base Resource Behavior

- `Resource::useClient($client)` creates an instance without running the constructor, then attaches the client.
- `attachClient()` stores the client for instance methods.
- Shared operations are implemented in the base class:
  - `all()`
  - `find()`
  - `refresh()`
  - `create()`
  - `update()`
  - `save()`
  - `delete()`
  - `query()`
- Resources declare request classes through constants like `INDEX_REQUEST`, `SHOW_REQUEST`, `CREATE_REQUEST`, `UPDATE_REQUEST`, `DELETE_REQUEST`, and optionally `QUERY_BUILDER`.
- If a resource does not define the required request constant for an operation, the base class throws at runtime.

### Constructor and Payload Conventions

- Constructor-promoted public properties represent fields expected for create/update operations.
- Response-only fields are usually declared as normal public properties outside the constructor.
- Create/update requests typically call `$resource->except(...)->toArray()` to strip response-only fields before sending JSON.
- Preserve this split when adding fields; avoid putting response-only API fields into constructor-promoted properties unless they belong in create/update payloads.

### Request Class Pattern

- Requests live beside the resource in a `Requests/` subdirectory.
- Common naming is `GetXRequest`, `CreateXRequest`, `UpdateXRequest`, `DeleteXRequest`, `SearchXRequest`.
- Search request naming is not fully consistent across the codebase (`SearchContactRequest`, `SearchItemsRequest`, `SearchBusinessActivitiesRequest` all exist). Match the local resource convention rather than trying to normalize unrelated files.
- Each request is responsible for `resolveEndpoint()` and `createDtoFromResponse()`.
- JSON body requests implement `HasBody` and use `HasJsonBody`.

### Query Builder Pattern

- Base implementations live in `src/Support/QueryBuilder.php` and `src/Support/SearchableQueryBuilder.php`.
- Shared fluent methods now include:
  - `limit()`
  - `offset()`
  - `forPage()`
  - `orderBy()`
  - `when()`
  - `get()`
  - `first()`
- `SearchableQueryBuilder` also provides `where()`, `whereIn()`, `whereNull()`, `whereNotNull()`, and `whereBetween()`.
- Public collection retrieval is `get()` only. The older `search()` builder API has been removed in the current major-version work.
- Searchable builders automatically switch from the resource `INDEX_REQUEST` to their dedicated `Search*Request` once any where-clause is present.
- Resource-specific builders should be thin and only add domain sugar or endpoint-specific context, such as `withArchived()`, `forContact()`, or invoice-specific status/date helpers.
- `QueryBuilder` still instantiates requests from constructor arguments, but resource-specific builders can override `indexRequestArguments()`, `searchRequestArguments()`, or `searchRequestQueryParameters()` when request constructor names or route context differ from the fluent builder state.

### Search DTOs

- Shared search operator enum: `src/Support/Data/SearchCriteria.php`.
- Shared base clause DTO: `src/Support/Data/SearchWhereClause.php`.
- Many resources add resource-specific clause classes such as `ContactSearchWhereClause`, `ItemSearchWhereClause`, or `ProjectSearchWhereClause`.
- Implementations are slightly inconsistent: some resource-specific clause classes extend the shared `SearchWhereClause`, others define their own `Data` class. Follow the pattern already used in the resource you are editing.

## Important Resource-Specific Caveats

### Invoice payload normalization

- `src/Resources/Sales/Invoices/Invoice.php` has custom API payload helpers:
  - `createFromApiPayload()` backfills `invoice_date` from `is_valid_from` when needed.
  - `collectFromApiPayload()` maps arrays through that normalization.
  - `toApi()` strips response-only/reporting fields from outgoing create payloads, including API-rejected fields like `document_nr` and `mwst_is_net`.
- Keep these helpers in sync with invoice response payloads and unit tests in `tests/Unit/Resources/Sales/Invoices/InvoiceDataTest.php`.

### Invoice query support

- `src/Resources/Sales/Invoices/InvoiceQueryBuilder.php` and `src/Resources/Sales/Orders/OrderQueryBuilder.php` are the sales-document-specific consumers of `SearchableQueryBuilder`.
- Invoice filtering uses `POST /2.0/kb_invoice/search` through `src/Resources/Sales/Invoices/Requests/SearchInvoicesRequest.php`.
- Live API verification shows `/2.0/kb_invoice/search` rejects a literal `invoice_date` search field; use `validFrom()`, `validTo()`, or `validBetween()` against the invoice's normalized `invoice_date`/validity dates instead.
- Preferred fluent helpers are `status()`, `statusIn()`, `validFrom()`, `validTo()`, and `validBetween()`.

### Order query support

- Order filtering uses `POST /2.0/kb_order/search` through `src/Resources/Sales/Orders/Requests/SearchOrdersRequest.php`.
- `src/Resources/Sales/Orders/OrderQueryBuilder.php` mirrors the invoice builder with `status()`, `statusIn()`, `validFrom()`, `validTo()`, and `validBetween()` helpers.
- Keep `Order::$kb_item_status_id` as an `int` for now. `OrderStatus` maps the documented order states: pending `5`, done `6`, partial `15`, and canceled `21`.
- `src/Resources/Sales/Orders/Order.php::toApi()` strips response-only and API-rejected create fields such as `taxs`, `mwst_is_net`, `is_valid_to`, `project_id`, and `reference` before `CreateOrderRequest` sends JSON.

### Additional addresses need contact context

- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddress.php` overrides `find()` and `delete()` because the endpoint requires both `contact_id` and address id.
- `src/Resources/Contacts/AdditionalAddresses/AdditionalAddressQueryBuilder.php` adds `forContact(int $contactId)` and custom request instantiation for the same reason.
- Do not assume base `Resource::find()` is sufficient for nested/contact-scoped resources.

### Office deep links

- `src/Support/Concerns/HasOfficeLink.php` builds Office URLs from `SHOW_URL` and `Resource::OFFICE_BASE_URL`.
- Resources using this trait must provide a matching `SHOW_URL` constant.

### Polymorphic item positions

- `src/Resources/Sales/ItemPositions/ItemPositionCast.php` maps item-position payloads by `type` into concrete DTO classes.
- Supported types are asserted in `tests/Unit/ItemPositionCastTest.php`.
- If Bexio adds a new item position type, update the enum, cast, and test together.

### Endpoint versions are mixed

- The codebase uses both `/2.0/...` and `/3.0/...` endpoints depending on the resource.
- Do not assume one version applies package-wide; check neighboring request classes before adding or editing endpoints.

## Authentication and Config

- Config file: `config/bexio.php`.
- Supported auth modes:
  - Personal access token via `BEXIO_ACCESS_TOKEN`
  - OAuth credentials via `BEXIO_CLIENT_ID`, `BEXIO_CLIENT_SECRET`, `BEXIO_REDIRECT_URI`
- Config also includes default OAuth scopes and optional stored OAuth access/refresh tokens.
- `.env.example` documents the expected environment variables.

## Testing Workflow

- A working BEXIO_ACCESS_TOKEN will always be provided via .env in local development and in CI.
- Test stack: Pest v3 + Orchestra Testbench.
- Main files:
  - `tests/Pest.php`
  - `tests/TestCase.php`
  - `phpunit.xml`
- Local commands:
  - `composer test`
  - `composer test:types`

### Test helpers

- `tests/Pest.php` defines shared helpers:
  - `testClient()` for live API access via `BexioClient::testAccount()`
  - `testMockClient()` for Saloon mock responses
  - cached helpers like `testSaleTax()`, `testSalesAccount()`, `testAccountId()`
- Resource coverage is expected to use real API requests. A working API key is available in local development and in CI, so new feature/resource tests should use `testClient()` and exercise the real Bexio endpoints rather than mocks.
- Keep mocks/fixtures for narrow unit tests only, such as DTO, casting, or request-construction behavior; do not treat mocked tests as sufficient coverage for a new API feature.
- Existing live API test patterns to follow:
  - create/update/delete flows that generate disposable records and clean them up, as in `tests/Resources/Contacts/Contacts/ContactRequestsTest.php`, `tests/Resources/Purchase/Bills/BillRequestsTest.php`, and `tests/Resources/Sales/Invoices/InvoiceRequestsTest.php`
  - read/search/query-builder coverage that fetches existing remote records, then skips only when the remote account genuinely lacks suitable data, as in `tests/Resources/Projects/Projects/ProjectRequestsTest.php` and `tests/Resources/Banking/PaymentRequestsTest.php`
- When an endpoint supports writes, prefer creating the prerequisite record inside the test instead of depending on pre-existing account data.
- When an endpoint is read-only or depends on account-specific data, fetch a small live dataset first and skip only if the remote account truly has no compatible records.
- One Saloon fixture currently exists at `tests/Fixtures/Saloon/contacts/contacts/get.json`.

### Test environment behavior

- `tests/TestCase.php` loads `LaravelDataServiceProvider` and `BexioServiceProvider`.
- The package test environment explicitly loads the package-root `.env` when neither `BEXIO_ACCESS_TOKEN` nor `TEST_API_KEY` is already present in the process environment, then sets `config('bexio.access_token')` from those variables.
- Missing credentials should not be treated as the normal path for local development or CI; if a test cannot run, the first assumption should be missing remote fixtures/data, not missing authentication.
- `tests/ArchitectureTest.php` currently bans debug helpers like `dd`, `dump`, `ray`, and `sleep`.

## CI and Release

- GitHub Actions workflow: `.github/workflows/CI.yml`.
- On pushes to `main`:
  - `Test` job runs on PHP 8.4.
  - It executes `php vendor/bin/pest --colors=always -v --parallel --processes=6`.
  - It exposes the same secret as both `BEXIO_ACCESS_TOKEN` and `TEST_API_KEY`.
- Release automation uses `googleapis/release-please-action@v4` with `release-type: php`.
- Test job is skipped for release commits whose message contains `chore(main): release`.
- Dependabot updates Composer and GitHub Actions weekly via `.github/dependabot.yml`.

## Documentation Drift To Watch

- `Contact` uses `titel_id` in `src/Resources/Contacts/Contacts/Contact.php`; some bundled Bexio docs may use `title_id` instead.
- Some Pest resource test files contain copied namespace declarations unrelated to their directory. Pest still executes them, so do not treat those namespaces as authoritative project structure.

## When Adding Or Updating Resources

- Mirror the established structure:
  1. Resource DTO in the resource directory
  2. Request classes in `Requests/`
  3. Optional query builder and search where-clause DTO
  4. Integration or unit tests in the matching `tests/Resources/...` or `tests/Unit/...` location
- Reuse the base `Resource` helpers unless the endpoint needs extra route context, custom normalization, or custom request assembly.
- Match existing endpoint versioning and local naming in the area you are editing.
- Every new API-facing feature should ship with real, working API tests in `tests/Resources/...`, following the established live-request style used by the existing resource suites.
- If you add response-only fields, keep outgoing payload filtering up to date.
- If you add a new pattern or project caveat, update this file in the same task.

## Documentation Placement and Maintenance

**When to document**
Update or add documentation whenever a task introduces verified changes, reveals missing context, or uncovers gaps that would have been useful upfront. Only document based on verified facts from the current task — no speculation.

**Where to document**
Apply this decision rule before writing anything:

1. Global, reusable, or task-agnostic guidance → `AGENTS.md`
2. File-, function-, or implementation-scoped insight → code comment at the relevant location
3. Public package usage examples and resource-specific integration notes → `docs/resources/<domain>/<resource>.md`
4. If both apply → global rule in `AGENTS.md`, local detail in code comment

Default to the narrowest correct target.

**Quality standard**
Keep `AGENTS.md` high-signal and durable. Summarize, deduplicate, and prune stale or overly narrow entries so it stays useful without wasting tokens.

**Completion check**
Before finalizing any task: confirm that all needed `AGENTS.md` updates and relevant code comments have been made, or explicitly verify that none are needed. The task is incomplete until this check passes.
