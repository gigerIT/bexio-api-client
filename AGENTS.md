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
- `docs/CONTACTS.md`: only detailed resource-specific guide currently in the repo
- `docs/bexio API docs.md` and `docs/bexio API documentation.html`: bundled reference material from Bexio
- `README.md`: installation, auth, examples, and resource coverage matrix

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

- Base implementation: `src/Support/QueryBuilder.php`.
- Shared builder methods:
  - `limit()`
  - `offset()`
  - `when()`
  - `get()`
  - `first()`
- `QueryBuilder::get()` reflects on the index request constructor and maps stored parameters by constructor parameter name. Parameter names in builder code must therefore match request constructor parameter names exactly.
- Resource-specific builders add methods like `where()`, `search()`, `withArchived()`, `orderBy()`, or `forContact()`.
- Search builders usually collect typed where-clause DTOs and send a dedicated `Search*Request`.

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
  - `toApi()` strips response-only/reporting fields from outgoing create payloads.
- Keep these helpers in sync with invoice response payloads and unit tests in `tests/Unit/Resources/Sales/Invoices/InvoiceDataTest.php`.

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
- Many resource tests are live integration tests and skip when no test token or suitable remote data is available.
- One Saloon fixture currently exists at `tests/Fixtures/Saloon/contacts/contacts/get.json`.

### Test environment behavior

- `tests/TestCase.php` loads `LaravelDataServiceProvider` and `BexioServiceProvider`.
- The package test environment sets `config('bexio.access_token')` from `BEXIO_ACCESS_TOKEN` or `TEST_API_KEY`.
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
- If you add response-only fields, keep outgoing payload filtering up to date.
- If you add a new pattern or project caveat, update this file in the same task.

## AGENTS.md Maintenance

- Update `AGENTS.md` immediately whenever codebase or project-context changes affect documented components, workflows, architecture, behavior, or any other guidance captured here.
- If you discover missing, unclear, or undocumented context that would have been useful upfront, add it to `AGENTS.md` during the same task so the guide keeps improving for future agents.
- Base `AGENTS.md` updates only on verified changes or context from the current task; do not guess or add unverified guidance.
- Keep the file optimized for signal over volume: summarize, deduplicate, and prune stale or obvious guidance so it stays focused on real project caveats and does not waste tokens over time.
- Apply required documentation updates as part of the same task whenever those conditions are met.
- Treat the task as incomplete until the needed `AGENTS.md` updates are made, or you have verified that no `AGENTS.md` update is needed.
- Before finalizing, verify that any `AGENTS.md` changes are consistent with the completed codebase or project-context changes.
