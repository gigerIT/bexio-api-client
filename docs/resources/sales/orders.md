# Orders

`Order` covers sales orders and exposes both the standard resource operations and an order-specific query builder. Unfiltered queries use `GET /2.0/kb_order`, and filtered queries switch to `POST /2.0/kb_order/search`.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Orders\Enums\OrderStatus;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch Orders

```php
$orders = Order::useClient($client)
    ->query()
    ->limit(20)
    ->orderBy('updated_at', 'desc')
    ->get();

$order = Order::useClient($client)->find(1);
```

## Search Orders

```php
$orders = Order::useClient($client)
    ->query()
    ->status(OrderStatus::PENDING)
    ->validFrom('2026-01-01')
    ->where('document_nr', SearchCriteria::EQUAL, 'AU-00001')
    ->orderBy('updated_at', 'desc')
    ->get();
```

## Status Filters

- `OrderStatus::PENDING` (`5`)
- `OrderStatus::DONE` (`6`)
- `OrderStatus::PARTIAL` (`15`)
- `OrderStatus::CANCELED` (`21`)

## Date Helpers

```php
$orders = Order::useClient($client)
    ->query()
    ->statusIn([OrderStatus::PENDING, OrderStatus::PARTIAL])
    ->validBetween('2026-01-01', '2026-01-31')
    ->get();
```

## Create An Order

```php
$order = new Order(
    title: 'API order',
    contact_id: 1,
    is_valid_from: '2026-01-01',
);

$order->positions->add(new ItemPositionCustom(
    amount: '1',
    text: 'Consulting',
    unit_price: '100.00',
    account_id: 1,
    tax_id: 1,
));

$created = $order->attachClient($client)->create();
```

## Update And Delete

```php
$order = Order::useClient($client)->find(1);

$order->title = 'Updated order title';
$order->save();

$order->delete();
```

## Notes

- Unfiltered order queries use `GET /2.0/kb_order` and support `orderBy()`, `limit()`, `offset()`, `forPage()`, and `first()`.
- The order query builder switches to `POST /2.0/kb_order/search` as soon as a search clause is added.
- Supported order helpers are `status()`, `statusIn()`, `validFrom()`, `validTo()`, and `validBetween()`.
- Outgoing create payloads automatically strip response-only and API-rejected fields before the request is sent.
