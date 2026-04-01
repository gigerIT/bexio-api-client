# Contact Groups

`ContactGroup` lets you categorize contacts such as customers, suppliers, or internal segments.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch And Search

```php
$groups = ContactGroup::useClient($client)->all();

$group = ContactGroup::useClient($client)->find(1);

$matches = ContactGroup::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'VIP')
    ->get();
```

## Create, Update, Delete

```php
$group = new ContactGroup(name: 'VIP Customers');

$created = $group->attachClient($client)->save();

$created->name = 'Premium Customers';
$created->save();

$created->delete();
```
