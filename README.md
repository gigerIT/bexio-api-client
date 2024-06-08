# bexio API PHP Client

This is a <a href="https://docs.saloon.dev/">`saloonphp/saloon`</a> API Client for the bexio
API (https://docs.bexio.com).

## Installation

```sh
composer require gigerit/bexio-api-client
```

## Examples

### Contacts

```php 
use Bexio\BeixoClient;
use Bexio\Resources\Contacts\Contacts\Contact;

$client = new BexioClient('api_token');

// Get the Contact with the ID 1
$contact = Contact::useClient($client)->find(1); 

// Access the Contact properties
echo $contact->id;
echo $contact->name_1;
echo $contact->mail;

// Simply change any properties of the Contact
$contact->name_1 = 'New Name'; 

// Save the changes
$contact->save(); 
````

See [Tests](tests/Feature/Resources) for more Examples.

## Data Transfer Objects

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
<img src="docs/assets/contacts_typehint.png" alt="drawing" width="600"/>

## Authentication

Currently, the package only supports the simple API Token authentication, as we did the implementation for one client
project only.

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



