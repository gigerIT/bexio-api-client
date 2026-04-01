# Titles

`Title` manages reusable contact titles such as `Dr.` or `Prof.`.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Titles\Title;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch And Search

```php
$titles = Title::useClient($client)->all();

$title = Title::useClient($client)->find(1);

$matches = Title::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Dr')
    ->get();
```

## Create, Update, Delete

```php
$title = new Title(name: 'Dr.');

$created = $title->attachClient($client)->save();

$created->name = 'Prof. Dr.';
$created->save();

$created->delete();
```
