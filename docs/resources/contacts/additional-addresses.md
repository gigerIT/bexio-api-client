# Additional Addresses

`AdditionalAddress` belongs to a specific contact, so both lookups and queries require contact context.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
$contactId = 1;
```

## Fetch And Search

```php
$addresses = AdditionalAddress::useClient($client)
    ->query()
    ->forContact($contactId)
    ->limit(10)
    ->get();

$matches = AdditionalAddress::useClient($client)
    ->query()
    ->forContact($contactId)
    ->where('name', SearchCriteria::LIKE, 'Warehouse')
    ->get();
```

## Get A Single Additional Address

```php
$addressFinder = new AdditionalAddress(contact_id: $contactId);

$address = $addressFinder->attachClient($client)->find(5);
```

## Create, Update, Delete

```php
$address = new AdditionalAddress(
    contact_id: $contactId,
    name: 'Warehouse',
    street_name: 'Industriestrasse',
    house_number: '10',
    postcode: '8005',
    city: 'Zurich',
    subject: 'Delivery address',
);

$created = $address->attachClient($client)->save();

$created->name = 'Warehouse West';
$created->save();

$created->delete();
```

## Notes

- Call `forContact($contactId)` before using the additional-address query builder.
- `find()` and `delete()` require `contact_id` on the resource instance because the API route is contact-scoped.
- The deprecated `address` property is response-only. Use structured address fields for writes.
