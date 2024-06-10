# bexio API PHP Client

This is a <a href="https://docs.bexio.com">bexio
API</a> client, built with <a href="https://docs.saloon.dev/">`saloonphp/saloon`</a>
and <a href="https://github.com/spatie/laravel-data">`spatie/laravel-data`</a>.

## Installation

```sh
composer require gigerit/bexio-api-client
```

## Examples

### Contacts

Get a Contact by ID:

```php
$client = new BexioClient('API_TOKEN');

// Get the Contact with the ID 1
$contact = Contact::useClient($client)->find(1); 

// Access the Contact properties
echo $contact->id;
echo $contact->name_1;
echo $contact->mail;
````

Get all Contacts:

```php
$client = new BexioClient('API_TOKEN');

// Get all Contacts
$contacts = Contact::useClient($client)->all();

// Access the Contacts
foreach ($contacts as $contact) {
    echo $contact->id;
    echo $contact->name_1;
    echo $contact->mail;
}
```

Create a Contact:

```php
$client = new BexioClient('API_TOKEN');

// Create a new Contact
$contact = new Contact(
    name_1: 'John Doe',
);

// Save the Contact
$contact->save();
```

Combine actions:

```php
$client = new BexioClient('API_TOKEN');

// Get the Contact with the ID 1
$contact = Contact::useClient($client)->find(1); 

// Access the Contact properties
echo $contact->id;
echo $contact->name_1;
echo $contact->mail;

// Simply update the Contact properties
$contact->name_1 = 'Jane Doe';

// Send the changes back to bexio
$contact->save();
````

See [Tests](tests/Resources) for more Examples.

## Data Transfer Objects

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
<img src="docs/assets/contacts_typehint.png" alt="drawing" width="600"/>

## Authentication

Currently, the package only supports simple API Token authentication as it was created for a single project.
If you need OAuth2 or other authentication methods, please feel free to open an issue or create a pull request.

## Available Resources

### CONTACTS

| Resource             | Implemented |
|----------------------|-------------|
| Contacts             | ✅           |
| Contact Relations    | ❌           |
| Contact Groups       | ❌           |
| Contact Sectors      | ❌           |
| Additional Addresses | ❌           |
| Salutations          | ❌           |
| Titles               | ❌           |

### SALES ORDER MANAGEMENT

| Resource            | Implemented |
|---------------------|-------------|
| Quotes              | ✅           |
| Orders              | ❌           |
| Deliveries          | ❌           |
| Invoices            | ❌           |
| Document Settings   | ❌           |
| Comments            | ❌           |
| Default positions   | ❌           |
| Item positions      | ❌           |
| Text positions      | ❌           |
| Subtotal positions  | ❌           |
| Discount positions  | ❌           |
| Pagebreak positions | ❌           |
| Sub positions       | ❌           |
| Document templates  | ❌           |

### PURCHASE

| Resource         | Implemented |
|------------------|-------------|
| Bills            | ❌           |
| Expenses         | ❌           |
| Purchase Orders  | ❌           |
| Outgoing Payment | ❌           |

### ACCOUNTING

| Resource       | Implemented |
|----------------|-------------|
| Accounts       | ❌           |
| Account Groups | ❌           |
| Calendar Years | ❌           |
| Business Years | ❌           |
| Currencies     | ❌           |
| Manual Entries | ❌           |
| Reports        | ❌           |
| Taxes          | ✅           |
| Vat Periods    | ❌           |

### BANKING

| Resource      | Implemented |
|---------------|-------------|
| Bank Accounts | ❌           |
| IBAN Payments | ❌           |
| QR Payments   | ❌           |
| Payments      | ❌           |

### ITEMS & PRODUCTS

| Resource        | Implemented |
|-----------------|-------------|
| Items           | ❌           |
| Stock locations | ❌           |
| Stock Areas     | ❌           |

### PROJECTS & TIME TRACKING

| Resource            | Implemented |
|---------------------|-------------|
| Projects            | ❌           |
| Timesheets          | ❌           |
| Business Activities | ❌           |
| Communication Types | ❌           |

### FILES

| Resource | Implemented |
|----------|-------------|
| Files    | ❌           |

### OTHER

| Resource        | Implemented |
|-----------------|-------------|
| Company Profile | ❌           |
| Countries       | ❌           |
| Languages       | ❌           |
| Notes           | ❌           |
| Payment Types   | ❌           |
| Permissions     | ❌           |
| Tasks           | ❌           |
| Units           | ❌           |
| User Management | ❌           |



