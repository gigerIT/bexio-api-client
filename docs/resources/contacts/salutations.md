# Salutations

`Salutation` manages reusable salutation values for contacts.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Salutations\Salutation;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch And Search

```php
$salutations = Salutation::useClient($client)->all();

$salutation = Salutation::useClient($client)->find(1);

$matches = Salutation::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Dear')
    ->get();
```

## Create, Update, Delete

```php
$salutation = new Salutation(name: 'Dear Team');

$created = $salutation->attachClient($client)->save();

$created->name = 'Dear Customer';
$created->save();

$created->delete();
```
