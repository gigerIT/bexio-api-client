# Contact Relations

`ContactRelation` links one contact to another and lets you store a short description of that relationship.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch And Search

```php
$relations = ContactRelation::useClient($client)->all();

$relation = ContactRelation::useClient($client)->find(1);

$matches = ContactRelation::useClient($client)
    ->query()
    ->where('contact_id', SearchCriteria::EQUAL, 1)
    ->get();
```

## Create, Update, Delete

```php
$relation = new ContactRelation(
    contact_id: 1,
    contact_sub_id: 2,
    description: 'Partner company',
);

$created = $relation->attachClient($client)->save();

$created->description = 'Subsidiary';
$created->save();

$created->delete();
```
