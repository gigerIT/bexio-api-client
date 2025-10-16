# Contacts Documentation

This document provides comprehensive examples for working with the Contacts module in the Bexio API Client.

## Table of Contents

- [Contacts](#contacts)
- [Contact Relations](#contact-relations)
- [Contact Groups](#contact-groups)
- [Contact Sectors](#contact-sectors)
- [Additional Addresses](#additional-addresses)
- [Salutations](#salutations)
- [Titles](#titles)

---

## Contacts

The Contact resource represents individuals or companies in your Bexio account.

### Get all Contacts

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;

$client = new BexioClient('API_TOKEN');

// Get all contacts
$contacts = Contact::useClient($client)->all();
```

### Get a specific Contact

```php
$contact = Contact::useClient($client)->find(1);

echo $contact->name_1;  // Company name or person's last name
echo $contact->mail;    // Email address
```

### Query Contacts with filters

```php
// Get 10 contacts with offset
$contacts = Contact::useClient($client)
    ->query()
    ->limit(10)
    ->offset(20)
    ->get();

// Include archived contacts
$contacts = Contact::useClient($client)
    ->query()
    ->withArchived()
    ->get();
```

### Search Contacts

```php
use Bexio\Support\Data\SearchCriteria;

$contacts = Contact::useClient($client)
    ->query()
    ->where('name_1', SearchCriteria::LIKE, 'John')
    ->where('city', SearchCriteria::EQUAL, 'Zurich')
    ->search();
```

### Create a Contact

```php
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;

$contact = new Contact(
    contact_type_id: ContactType::PERSON,
    name_1: 'Doe',              // Last name
    name_2: 'John',             // First name
    address: 'Main Street 123',
    postcode: '8000',
    city: 'Zurich',
    country_id: 1,
    mail: 'john.doe@example.com',
    phone_fixed: '+41 44 123 45 67',
    user_id: 1,
    owner_id: 1,
);

$createdContact = $contact->attachClient($client)->save();
```

### Create a Company Contact

```php
$contact = new Contact(
    contact_type_id: ContactType::COMPANY,
    name_1: 'ACME Corporation',  // Company name
    name_2: 'Inc.',              // Company addition
    address: 'Business Park 1',
    postcode: '8001',
    city: 'Zurich',
    mail: 'info@acme.com',
    user_id: 1,
    owner_id: 1,
);

$createdContact = $contact->attachClient($client)->save();
```

### Update a Contact

```php
$contact = Contact::useClient($client)->find(1);

$contact->name_2 = 'Jane';
$contact->mail = 'jane.doe@example.com';

$contact->save();
```

### Delete a Contact

```php
$contact = Contact::useClient($client)->find(1);
$contact->delete();

// Or delete by ID
Contact::useClient($client)->delete(1);
```

### Bulk Create Contacts

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

$createdContacts = Contact::bulkCreate($contacts, $client);
```

### Restore a Contact

```php
$contact = Contact::useClient($client)->find(1);
$result = $contact->restore();

// Returns: ['success' => true]
```

---

## Contact Relations

Contact Relations link two contacts together, establishing relationships between them.

### Get all Contact Relations

```php
use Bexio\Resources\Contacts\ContactRelations\ContactRelation;

$relations = ContactRelation::useClient($client)->all();
```

### Get a specific Contact Relation

```php
$relation = ContactRelation::useClient($client)->find(1);
```

### Create a Contact Relation

```php
$relation = new ContactRelation(
    contact_id: 1,
    contact_sub_id: 2,
    description: 'Partner companies',
);

$createdRelation = $relation->attachClient($client)->save();
```

### Update a Contact Relation

```php
$relation = ContactRelation::useClient($client)->find(1);
$relation->description = 'Subsidiary';
$relation->save();
```

### Delete a Contact Relation

```php
$relation = ContactRelation::useClient($client)->find(1);
$relation->delete();
```

### Search Contact Relations

```php
use Bexio\Support\Data\SearchCriteria;

$relations = ContactRelation::useClient($client)
    ->query()
    ->where('contact_id', SearchCriteria::EQUAL, '1')
    ->search();
```

---

## Contact Groups

Contact Groups allow you to categorize contacts (e.g., Customers, Suppliers).

### Get all Contact Groups

```php
use Bexio\Resources\Contacts\ContactGroups\ContactGroup;

$groups = ContactGroup::useClient($client)->all();
```

### Get a specific Contact Group

```php
$group = ContactGroup::useClient($client)->find(1);
```

### Create a Contact Group

```php
$group = new ContactGroup(
    name: 'VIP Customers',
);

$createdGroup = $group->attachClient($client)->save();
```

### Update a Contact Group

```php
$group = ContactGroup::useClient($client)->find(1);
$group->name = 'Premium Customers';
$group->save();
```

### Delete a Contact Group

```php
$group = ContactGroup::useClient($client)->find(1);
$group->delete();
```

### Search Contact Groups

```php
use Bexio\Support\Data\SearchCriteria;

$groups = ContactGroup::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Customer')
    ->search();
```

---

## Contact Sectors

Contact Sectors categorize contacts by industry or business sector.

### Get all Contact Sectors

```php
use Bexio\Resources\Contacts\ContactSectors\ContactSector;

$sectors = ContactSector::useClient($client)->all();
```

### Get a specific Contact Sector

```php
$sector = ContactSector::useClient($client)->find(1);
```

### Query Contact Sectors

```php
$sectors = ContactSector::useClient($client)
    ->query()
    ->limit(10)
    ->get();
```

### Search Contact Sectors

```php
use Bexio\Support\Data\SearchCriteria;

$sectors = ContactSector::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Technology')
    ->search();
```

**Note:** Contact Sectors are read-only in the Bexio API. You can only fetch and search them, but cannot create, update, or delete them via the API.

---

## Additional Addresses

Additional Addresses allow you to add multiple addresses to a single contact.

### Get all Additional Addresses for a Contact

```php
use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;

$addresses = AdditionalAddress::useClient($client)
    ->query()
    ->forContact(1)
    ->get();
```

### Get a specific Additional Address

```php
$address = AdditionalAddress::useClient($client)->find(1);
```

### Create an Additional Address

```php
$address = new AdditionalAddress(
    id: null,
    contact_id: 1,
    name: 'Billing Address',
    address: 'PO Box 123',
    postcode: '8000',
    city: 'Zurich',
    country_id: 1,
    subject: 'Billing',
    description: 'Primary billing address',
);

$createdAddress = $address->attachClient($client)->save();
```

### Update an Additional Address

```php
$address = AdditionalAddress::useClient($client)->find(1);
$address->name = 'Shipping Address';
$address->city = 'Bern';
$address->save();
```

### Delete an Additional Address

```php
$address = AdditionalAddress::useClient($client)->find(1);
$address->delete();
```

### Search Additional Addresses

```php
use Bexio\Support\Data\SearchCriteria;

$addresses = AdditionalAddress::useClient($client)
    ->query()
    ->forContact(1)
    ->where('name', SearchCriteria::LIKE, 'Billing')
    ->search();
```

---

## Salutations

Salutations define how contacts are addressed (e.g., Mr., Mrs., Dr.).

### Get all Salutations

```php
use Bexio\Resources\Contacts\Salutations\Salutation;

$salutations = Salutation::useClient($client)->all();
```

### Get a specific Salutation

```php
$salutation = Salutation::useClient($client)->find(1);
```

### Create a Salutation

```php
$salutation = new Salutation(
    name: 'Dr.',
);

$createdSalutation = $salutation->attachClient($client)->save();
```

### Update a Salutation

```php
$salutation = Salutation::useClient($client)->find(1);
$salutation->name = 'Prof. Dr.';
$salutation->save();
```

### Delete a Salutation

```php
$salutation = Salutation::useClient($client)->find(1);
$salutation->delete();
```

### Search Salutations

```php
use Bexio\Support\Data\SearchCriteria;

$salutations = Salutation::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Dr')
    ->search();
```

---

## Titles

Titles define professional or academic titles for contacts.

### Get all Titles

```php
use Bexio\Resources\Contacts\Titles\Title;

$titles = Title::useClient($client)->all();
```

### Get a specific Title

```php
$title = Title::useClient($client)->find(1);
```

### Create a Title

```php
$title = new Title(
    name: 'CEO',
);

$createdTitle = $title->attachClient($client)->save();
```

### Update a Title

```php
$title = Title::useClient($client)->find(1);
$title->name = 'Managing Director';
$title->save();
```

### Delete a Title

```php
$title = Title::useClient($client)->find(1);
$title->delete();
```

### Search Titles

```php
use Bexio\Support\Data\SearchCriteria;

$titles = Title::useClient($client)
    ->query()
    ->where('name', SearchCriteria::LIKE, 'Director')
    ->search();
```

---

## Query Builder Methods

All resources support the following query builder methods:

### Pagination

```php
->limit(100)      // Limit results (max 2000)
->offset(50)      // Skip results
```

### Search Criteria

```php
use Bexio\Support\Data\SearchCriteria;

SearchCriteria::EQUAL          // =
SearchCriteria::NOT_EQUAL      // !=
SearchCriteria::GREATER_THAN   // >
SearchCriteria::GREATER_EQUAL  // >=
SearchCriteria::LESS_THAN      // <
SearchCriteria::LESS_EQUAL     // <=
SearchCriteria::LIKE           // LIKE
SearchCriteria::NOT_LIKE       // NOT LIKE
SearchCriteria::IS_NULL        // IS NULL
SearchCriteria::NOT_NULL       // IS NOT NULL
SearchCriteria::IN             // IN
SearchCriteria::NOT_IN         // NOT IN
```

### Get First Result

```php
// Get first result from index
$contact = Contact::useClient($client)->query()->first();

// Get first result from search
$contact = Contact::useClient($client)
    ->query()
    ->where('name_1', SearchCriteria::LIKE, 'John')
    ->first();
```

---

## Complete Example

Here's a complete example showing multiple operations:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Support\Data\SearchCriteria;

$client = new BexioClient('API_TOKEN');

// 1. Create a contact group
$group = new ContactGroup(name: 'New Customers');
$group = $group->attachClient($client)->save();

// 2. Create a contact
$contact = new Contact(
    contact_type_id: ContactType::COMPANY,
    name_1: 'Tech Solutions AG',
    address: 'Innovation Street 1',
    postcode: '8000',
    city: 'Zurich',
    mail: 'info@techsolutions.ch',
    contact_group_ids: (string)$group->id,
    user_id: 1,
    owner_id: 1,
);
$contact = $contact->attachClient($client)->save();

// 3. Add an additional address
$additionalAddress = new AdditionalAddress(
    id: null,
    contact_id: $contact->id,
    name: 'Delivery Address',
    address: 'Warehouse Road 5',
    postcode: '8001',
    city: 'Zurich',
    subject: 'Delivery',
);
$additionalAddress->attachClient($client)->save();

// 4. Search for contacts in the group
$groupContacts = Contact::useClient($client)
    ->query()
    ->where('contact_group_ids', SearchCriteria::LIKE, (string)$group->id)
    ->search();

echo "Found " . count($groupContacts) . " contacts in the group";
```
