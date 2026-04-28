---
name: bexio-api-client-development
description: >-
  Use when building or maintaining integrations with gigerit/bexio-api-client, including auth,
  resources, query builders, sales document flows, and package conventions.
---

# Bexio API Client Development

## When to use this skill
Use this skill when working with the `gigerit/bexio-api-client` package itself or when
generating code that consumes the package in a Laravel app.

Use it for:
- configuring Bexio authentication
- reading, creating, updating, and deleting Bexio resources
- using resource query builders and search filters
- implementing new resources, requests, DTO fields, or package tests
- working with sales document payloads, item positions, conversions, and query behavior

## Package overview
- Package: `gigerit/bexio-api-client`
- Runtime: PHP `^8.2`, Laravel `^10|^11|^12|^13`
- HTTP layer: `saloonphp/saloon`
- DTO layer: `spatie/laravel-data`
- Main connectors:
  - `Bexio\BexioClient` for `https://api.bexio.com`
  - `Bexio\BexioAuth` for OAuth against `https://auth.bexio.com/realms/bexio/protocol/openid-connect`

## Installation and configuration

Install:

```bash
composer require gigerit/bexio-api-client
php artisan vendor:publish --tag=bexio-config
```

Basic auth with a personal access token:

```env
BEXIO_ACCESS_TOKEN=your-access-token
```

OAuth auth:

```env
BEXIO_CLIENT_ID=your-client-id
BEXIO_CLIENT_SECRET=your-client-secret
BEXIO_REDIRECT_URI=https://your-app.com/bexio/callback

# optional persisted tokens
BEXIO_OAUTH_ACCESS_TOKEN=...
BEXIO_OAUTH_REFRESH_TOKEN=...
```

Resolve the client from the container or facade:

```php
use Bexio\BexioClient;
use Bexio\Facades\Bexio;

$client = app(BexioClient::class);
$sameClient = Bexio::getFacadeRoot();
```

## Core usage pattern
Resources extend `Bexio\Resources\Resource` and are used through a client-bound instance.

Read:

```php
use Bexio\Resources\Contacts\Contacts\Contact;

$contacts = Contact::useClient($client)->all();
$contact = Contact::useClient($client)->find(1);
```

Create or update:

```php
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;

$contact = new Contact(
    contact_type_id: ContactType::PERSON,
    name_1: 'Doe',
    name_2: 'Jane',
    city: 'Zurich',
    country_id: 1,
    user_id: 1,
    owner_id: 1,
);

$saved = $contact->attachClient($client)->save();

$saved->mail = 'jane@example.com';
$saved->save();
```

Delete:

```php
$saved->delete();
```

## DTO and payload conventions
- Constructor-promoted public properties are usually create/update payload fields.
- Response-only fields should usually be plain public properties outside the constructor.
- Outgoing payloads are commonly filtered with `$resource->except(...)->toArray()` inside request or resource helpers.
- Do not move response-only API fields into constructor-promoted properties unless the API accepts them on write.
- Preserve package naming even when Bexio docs differ. Example: contacts use `titel_id`, not `title_id`.

## Query builder usage
Use `->query()` for fluent reads.

Shared methods:
- `limit()`
- `offset()`
- `forPage()`
- `orderBy()`
- `when()`
- `get()`
- `first()`

Searchable resources also support:
- `where()`
- `whereIn()`
- `whereNull()`
- `whereNotNull()`
- `whereBetween()`

Use `get()` for both index and filtered queries. Do not use `search()`; that API was
removed in the current major version.

Example:

```php
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Support\Data\SearchCriteria;

$contacts = Contact::useClient($client)
    ->query()
    ->where('name_1', SearchCriteria::LIKE, 'John')
    ->where('city', SearchCriteria::EQUAL, 'Zurich')
    ->orderBy('updated_at', 'desc')
    ->forPage(1, 50)
    ->get();
```

Implementation notes:
- `Bexio\Support\QueryBuilder` is the base for index-style requests.
- `Bexio\Support\SearchableQueryBuilder` automatically switches to the resource search request
  once any `where*` clause is added.
- Resource-specific builders should stay thin and add only domain helpers or route context.

## Sales document guidance
Invoices, orders, and quotes share sales document query patterns, but each document type
has a few API-specific payload rules.

Use:
- `Bexio\Resources\Sales\Invoices\Invoice`
- `Bexio\Resources\Sales\Invoices\InvoiceQueryBuilder`
- `Bexio\Resources\Sales\Orders\Order`
- `Bexio\Resources\Sales\Orders\OrderQueryBuilder`
- `Bexio\Resources\Sales\Quotes\Quote`
- `Bexio\Resources\Sales\Quotes\QuoteQueryBuilder`

Shared sales document query helpers:
- `status()`
- `statusIn()`
- `validFrom()`
- `validTo()`
- `validBetween()`

Example:

```php
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;

$invoices = Invoice::useClient($client)
    ->query()
    ->status(InvoiceStatus::DRAFT)
    ->validBetween('2026-01-01', '2026-01-31')
    ->orderBy('updated_at', 'desc')
    ->forPage(1, 25)
    ->get();
```

Invoice payload rules:
- `Invoice::createFromApiPayload()` backfills `invoice_date` from `is_valid_from` when needed.
- `Invoice::toApi()` removes reporting and response-only fields before writes.
- Keep API-rejected fields like `document_nr` and `mwst_is_net` out of create/update payloads.

Item payload rules:
- Bexio item responses may hydrate `article_type_id` as `null`.
- Do not send `article_type_id` or route `id` in `/2.0/article` create/update payloads.

Order and quote query rules:
- Unfiltered orders use `GET /2.0/kb_order`; filtered orders use `POST /2.0/kb_order/search`.
- Unfiltered quotes use `GET /2.0/kb_offer`; filtered quotes use `POST /2.0/kb_offer/search`.
- Quote validity searches use API field `is_valid_until`; do not use `is_valid_to` for quote helpers.
- `OrderStatus` maps pending `5`, done `6`, partial `15`, and canceled `21`.

Sales document item-position rules:
- Orders, quotes, and invoices containing `ItemPositionArticle` are created as an empty document
  first, then positions are added through dedicated item-position endpoints. Some Bexio widget
  schemas reject inline `article_id` on sales document create endpoints.
- Updating an existing `ItemPositionArticle` omits `article_id` and `parent_id`; delete and recreate
  the article position to change the linked item.
- Sales document update payloads strip `positions`; manage positions through item-position endpoints.

Purchase payload rules:
- Bill and purchase-order create/update requests use `toApi()` helpers so hydrated DTOs do not
  resend response-only IDs, document numbers, statuses, totals, timestamps, or embedded response
  objects.

Conversion rules:
- `Quote::createOrder()`, `Quote::createInvoice()`, `Order::createDelivery()`, and
  `Order::createInvoice()` call Bexio conversion endpoints.
- When callers omit conversion positions, the package derives explicit source-position payloads
  from the source document because live Bexio rejects empty or null `positions` for
  package-created source documents.

## Nested and special-case resources
- `AdditionalAddress` requires contact context; use `->forContact($contactId)` before `get()` or filtered queries.
- `InvoiceReminder` requires invoice context; use `->forInvoice($invoiceId)` before `get()` or
  filtered queries, and keep `kb_invoice_id` available for `find()` and `delete()`.
- `ManualEntry` has no documented/live show endpoint; use index queries for reads. `find()` and
  `refresh()` intentionally throw instead of calling `/3.0/accounting/manual_entries/{id}`.
- Some resources use different endpoint versions (`/2.0/...` and `/3.0/...`); always match
  neighboring request classes instead of assuming one global API version.
- Resources using `HasOfficeLink` must define a matching `SHOW_URL` constant.

## Adding or changing package resources
When adding a resource feature, mirror the existing package structure:

1. DTO in `src/Resources/...`
2. Request classes in a local `Requests/` directory
3. Optional resource-specific query builder or clause DTO only if needed
4. Tests in the matching `tests/Resources/...` or `tests/Unit/...` path

Prefer:
- base `Resource` helpers for CRUD
- `SearchableQueryBuilder` for resources with separate search endpoints
- `Bexio\Support\Requests\SearchRequest` for search requests that only need the shared POST JSON
  `searchClauses` body behavior
- resource-specific builder sugar only for context-specific helpers like `forContact()` or invoice status/date methods
- README `## Available Resources` updates whenever endpoint implementation status changes

## Testing guidance
- Test stack: Pest + Orchestra Testbench
- Main commands:

```bash
composer test
composer test:types
```

- Use real API coverage for API-facing package features through `testClient()` from `tests/Pest.php`.
- Prefer creating disposable remote records inside tests for write-capable endpoints.
- For read-only endpoints, fetch a small live dataset and skip only when the remote account
  genuinely has no compatible data.
- Use mock responses only for narrow unit tests like DTO normalization or request-construction behavior.
- Live tests may run in parallel against one Bexio account. When testing a specific record, scope
  queries by unique fixture data instead of assuming unfiltered `first()` or `orderBy('id', 'desc')`
  returns the record created by the current test.

## Best practices for AI-generated code
- Bind a client with `useClient()` for static reads and `attachClient()` for instance writes.
- Reuse existing request and DTO patterns from the nearest resource instead of inventing new ones.
- Keep query-builder APIs fluent and Laravel-like; collection retrieval should end with `get()` or `first()`.
- If adding response-only fields, update outgoing payload filtering and relevant tests together.
- When changing package architecture or conventions, also update package guidance such as
  `AGENTS.md`, README usage, and any Boost skill content.
