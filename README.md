# bexio API PHP Client

This is a <a href="https://docs.saloon.dev/">`saloonphp/saloon`</a> API Client for the bexio
API (https://docs.bexio.com).

It provides an API Client and API Resources DTOs with types.

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

See [Tests](tests/Feature) for more Examples.

## DTOs

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
<img src="docs/assets/contacts_typehint.png" alt="drawing" width="600"/>

## Available Resources

- CONTACTS
    - ✅ Contacts
    - Contact Relations
    - Contact Groups
    - Contact Sectors
    - Additional Addresses
    - Salutations
    - Titles
- SALES ORDER MANAGEMENT
    - ✅ Quotes
    - Orders
    - Deliveries
    - Invoices
    - Document Settings
    - Comments
    - Default positions
    - Item positions
    - Text positions
    - Subtotal positions
    - Discount positions
    - Pagebreak positions
    - Sub positions
    - Document templates
- PURCHASE
    - Bills
    - Expenses
    - Purchase Orders
    - Outgoing Payment
- ACCOUNTING
    - Accounts
    - Account Groups
    - Calendar Years
    - Business Years
    - Currencies
    - Manual Entries
    - Reports
    - ✅ Taxes
    - Vat Periods
- BANKING
    - Bank Accounts
    - IBAN Payments
    - QR Payments
    - Payments
- ITEMS & PRODUCTS
    - Items
    - Stock locations
    - Stock Areas
- PROJECTS & TIME TRACKING
    - Projects
    - Timesheets
    - Business Activities
    - Communication Types
- FILES
    - Files
- OTHER
    - Company Profile
    - Countries
    - Languages
    - Notes
    - Payment Types
    - Permissions
    - Tasks
    - Units
    - User Management

