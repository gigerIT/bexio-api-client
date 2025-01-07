# bexio API PHP Client

This is a [bexio API](https://docs.bexio.com) client, built with [`saloonphp/saloon`](https://docs.saloon.dev/) and [`spatie/laravel-data`](https://github.com/spatie/laravel-data).

## Introduction

The bexio API PHP Client allows you to interact with the bexio API seamlessly. It provides a simple and intuitive interface to manage contacts, sales orders, accounting, and more.

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
```

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
```

See [Tests](tests/Resources) for more examples.

## Data Transfer Objects

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
![Type Hinting](docs/assets/contacts_typehint.png)

## Authentication

To obtain an API token, you can use the BexioAuth helper to generate and refresh OAuth2 tokens.

1. Initialize the BexioAuth helper with your `client_id`, `client_secret`, and `redirect_uri`.

```php
use Bexio\BexioAuth;

$auth = new BexioAuth(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI'
);
```

2. Generate an authorization URL and redirect the user to it.

```php
$url = $auth->getAuthorizationUrl(
    scopes: [
        "company_profile",
        "email",
        "offline_access",
        "openid",
        "profile",
    ],
    state: 'random-state-string'
);

header('Location: ' . $url);
```

3. After the user has authorized the app, the user will be redirected back to the `redirect_uri` with a `code` parameter.

```php
$code = $_GET['code'];
$state = $_GET['state'];

$oauthAuthenticator = $auth->getAccessToken($code, $state, 'random-state-string');

// Your logic to store the access token and refresh token
```

4. Use the access token to authenticate the BexioClient.

```php
//Your logic to retrieve the access token and refresh token

if ($auth->hasExpired()) {
    $auth = BexioAuth::make()->refreshAccessToken($auth);
   
   // Your logic to store the new access token and refresh token
}

$client = new BexioClient($auth->getAccessToken());
```

## Available Resources

### CONTACTS

| Resource             | Implemented |
| -------------------- | ----------- |
| Contacts             | ✅          |
| Contact Relations    | ❌          |
| Contact Groups       | ❌          |
| Contact Sectors      | ❌          |
| Additional Addresses | ❌          |
| Salutations          | ❌          |
| Titles               | ❌          |

### SALES ORDER MANAGEMENT

| Resource            | Implemented |
| ------------------- | ----------- |
| Quotes              | ✅          |
| Orders              | ❌          |
| Deliveries          | ❌          |
| Invoices            | ❌          |
| Document Settings   | ❌          |
| Comments            | ❌          |
| Default positions   | ❌          |
| Item positions      | ❌          |
| Text positions      | ❌          |
| Subtotal positions  | ❌          |
| Discount positions  | ❌          |
| Pagebreak positions | ❌          |
| Sub positions       | ❌          |
| Document templates  | ❌          |

### PURCHASE

| Resource         | Implemented |
| ---------------- | ----------- |
| Bills            | ❌          |
| Expenses         | ❌          |
| Purchase Orders  | ❌          |
| Outgoing Payment | ❌          |

### ACCOUNTING

| Resource       | Implemented |
| -------------- | ----------- |
| Accounts       | ✅          |
| Account Groups | ❌          |
| Calendar Years | ❌          |
| Business Years | ❌          |
| Currencies     | ❌          |
| Manual Entries | ❌          |
| Reports        | ❌          |
| Taxes          | ✅          |
| Vat Periods    | ❌          |

### BANKING

| Resource      | Implemented |
| ------------- | ----------- |
| Bank Accounts | ❌          |
| IBAN Payments | ❌          |
| QR Payments   | ❌          |
| Payments      | ❌          |

### ITEMS & PRODUCTS

| Resource        | Implemented |
| --------------- | ----------- |
| Items           | ❌          |
| Stock locations | ❌          |
| Stock Areas     | ❌          |

### PROJECTS & TIME TRACKING

| Resource            | Implemented |
| ------------------- | ----------- |
| Projects            | ❌          |
| Timesheets          | ❌          |
| Business Activities | ❌          |
| Communication Types | ❌          |

### FILES

| Resource | Implemented |
| -------- | ----------- |
| Files    | ❌          |

### OTHER

| Resource        | Implemented |
| --------------- | ----------- |
| Company Profile | ✅          |
| Countries       | ❌          |
| Languages       | ❌          |
| Notes           | ❌          |
| Payment Types   | ❌          |
| Permissions     | ❌          |
| Tasks           | ❌          |
| Units           | ❌          |
| User Management | ❌          |
