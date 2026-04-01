# Contacts

The `Contact` resource covers people and companies in your Bexio account.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## Fetch Contacts

```php
$contacts = Contact::useClient($client)
    ->query()
    ->limit(20)
    ->orderBy('id', 'desc')
    ->get();

$contact = Contact::useClient($client)->find(1);
```

## Search Contacts

```php
$contacts = Contact::useClient($client)
    ->query()
    ->withArchived()
    ->where('name_1', SearchCriteria::LIKE, 'Acme')
    ->where('city', SearchCriteria::EQUAL, 'Zurich')
    ->get();
```

## Create A Person Contact

```php
$contact = new Contact(
    contact_type_id: ContactType::PERSON,
    name_1: 'Doe',
    name_2: 'Jane',
    street_name: 'Main Street',
    house_number: '123',
    postcode: '8000',
    city: 'Zurich',
    country_id: 1,
    mail: 'jane.doe@example.com',
    user_id: 1,
    owner_id: 1,
);

$created = $contact->attachClient($client)->save();
```

## Create A Company Contact

```php
$contact = new Contact(
    contact_type_id: ContactType::COMPANY,
    name_1: 'Acme AG',
    name_2: 'Operations',
    city: 'Zurich',
    mail: 'info@acme.test',
    user_id: 1,
    owner_id: 1,
);

$created = $contact->attachClient($client)->save();
```

## Update And Delete

```php
$contact = Contact::useClient($client)->find(1);

$contact->mail = 'new-address@example.com';
$contact->save();

$contact->delete();
```

## Bulk Create

```php
$contacts = [
    new Contact(
        contact_type_id: ContactType::PERSON,
        name_1: 'Smith',
        name_2: 'John',
        user_id: 1,
        owner_id: 1,
    ),
    new Contact(
        contact_type_id: ContactType::COMPANY,
        name_1: 'Tech Corp',
        user_id: 1,
        owner_id: 1,
    ),
];

$created = Contact::bulkCreate($contacts, $client);
```

## Restore An Archived Contact

```php
$contact = Contact::useClient($client)->find(1);

$result = $contact->restore();
```

## Notes

- Use `titel_id` when assigning a title. The package intentionally matches that field name even though some Bexio docs use `title_id`.
- `withArchived()` is specific to the contact query builder.
- The deprecated `address` property is response-only. Prefer `street_name`, `house_number`, and `address_addition` for writes.
