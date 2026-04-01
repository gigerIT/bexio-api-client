# Quotes

`Quote` covers sales quotes and exposes both the standard resource operations and a quote-specific query builder. Unfiltered queries use `GET /2.0/kb_offer`, and filtered queries switch to `POST /2.0/kb_offer/search`.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch Quotes

```php
$quotes = Quote::useClient($client)
    ->query()
    ->limit(20)
    ->orderBy('updated_at', 'desc')
    ->get();

$quote = Quote::useClient($client)->find(1);
```

## Search Quotes

```php
$quotes = Quote::useClient($client)
    ->query()
    ->status(QuoteStatus::DRAFT)
    ->validBetween('2026-04-01', '2026-04-15')
    ->where('title', SearchCriteria::LIKE, 'API quote')
    ->orderBy('updated_at', 'desc')
    ->get();
```

## Create And Delete

```php
$quote = new Quote(
    title: 'API quote',
    contact_id: 1,
    is_valid_from: '2026-04-01',
    is_valid_until: '2026-04-15',
    positions: collect(),
);

$quote->positions->add(new ItemPositionCustom(
    amount: '1',
    text: 'Consulting',
    unit_price: '100.00',
    account_id: 1,
    tax_id: 1,
));

$created = $quote->attachClient($client)->create();

$created->delete();
```

## Notes

- Unfiltered quote queries use `GET /2.0/kb_offer` and support `orderBy()`, `limit()`, `offset()`, `forPage()`, and `first()`.
- The quote query builder switches to `POST /2.0/kb_offer/search` as soon as a search clause is added.
- Supported quote helpers are `status()`, `statusIn()`, `validFrom()`, `validTo()`, and `validBetween()`.
- `validTo()` and `validBetween()` filter on `is_valid_until`, which matches the live quote search endpoint.
