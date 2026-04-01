# Contact Sectors

`ContactSector` is a read-only resource used to inspect the available contact sector values in the account.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch And Search

```php
$sectors = ContactSector::useClient($client)
    ->query()
    ->orderBy('id')
    ->get();

$sector = ContactSector::useClient($client)->find(1);

$matches = ContactSector::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Retail')
    ->get();
```

## Notes

- `ContactSector` currently exposes list, fetch, and search/query behavior.
- There are no create, update, or delete helpers for this resource in the package.
