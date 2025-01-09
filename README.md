# bexio API PHP Client

This is a [bexio API](https://docs.bexio.com) client, built with [`saloonphp/saloon`](https://docs.saloon.dev/) as API connector and [`spatie/laravel-data`](https://github.com/spatie/laravel-data) for DTOs.

## Introduction

The bexio API PHP Client allows you to interact with the bexio API seamlessly. It provides a simple and intuitive interface to manage contacts, sales orders, accounting, and more. As we come from the Laravel world we gave this client a Laravel-like feel.

## Installation

```sh
composer require gigerit/bexio-api-client
```

## Examples

### Contacts

Get a Contact by ID:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contact;

$client = new BexioClient('API_TOKEN');

// Get the Contact with ID 1
$contact = Contact::useClient($client)->find(1); 

// Access the Contact properties
echo $contact->id;
echo $contact->name_1;
echo $contact->mail;
```

Get all Contacts:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contact;

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
use Bexio\BexioClient;
use Bexio\Resources\Contact;

$client = new BexioClient('API_TOKEN');

// Create a new Contact
$contact = new Contact(
    name_1: 'John Doe',
);

// Save the Contact
$contact->attachClient($client)->save();
```

Combine actions:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contact;

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
1. Connect to Bexio: Generate an authorization URL and redirect the user to it.
```php
use Bexio\BexioAuth;

//Provided from https://developer.bexio.com/
$auth = new BexioAuth(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'http://localhost/bexio/callback'
);

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
2. Callback: After the user has authorized the app, the user will be redirected back to the `redirect_uri` with a `code` parameter.
```php
use Bexio\BexioAuth;

$code = $_GET['code'];
$state = $_GET['state'];


$auth = new BexioAuth(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'http://localhost/bexio/callback'
);

$oauthAuthenticator = $auth->getAccessToken($code, $state, 'random-state-string');

// ----------------------------------------
// Your logic to store the access token and refresh token
// (e.g. in a database, you can just serialize the $oauthAuthenticator object for example)
// ----------------------------------------

```

3. Use Client & Refresh Token: Use the access token to authenticate the BexioClient.

```php
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Bexio\BexioClient;
use Bexio\BexioAuth;
    
// ----------------------------------------
// Your logic to retrieve the access token and refresh token
// ----------------------------------------

//create a AccessTokenAuthenticator object or unserialize it from your store/database
$auth = new AccessTokenAuthenticator(
    $yourDatastore->access_token,
    $yourDatastore->refresh_token,
    $yourDatastore->access_token_expires_at //as DateTimeImmutable
);

if ($auth->hasExpired()) {
    $auth = BexioAuth::make()->refreshAccessToken($auth);
   
   // ----------------------------------------
   // Your logic to store the new access token and refresh token
   // ----------------------------------------
}

$client = new BexioClient($auth->getAccessToken());

// Use the client to interact with the bexio API
```

## Available Resources

### CONTACTS

| Resource             | Implemented |
| -------------------- | ----------- |
| Contacts             | ✅          |
| Contact Relations    | ✅          |
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
| Invoices            | ✅          |
| Document Settings   | ❌          |
| Comments            | ✅          |
| Default positions   | ✅          |
| Item positions      | ✅          |
| Text positions      | ✅          |
| Subtotal positions  | ✅          |
| Discount positions  | ✅          |
| Pagebreak positions | ✅          |
| Sub positions       | ✅          |
| Document templates  | ❌          |

### PURCHASE

| Resource         | Implemented |
| ---------------- | ----------- |
| Bills            | ✅          |
| Expenses         | ✅          |
| Purchase Orders  | ✅          |
| Outgoing Payment | ❌          |

### ACCOUNTING

| Resource       | Implemented |
| -------------- | ----------- |
| Accounts       | ✅          |
| Account Groups | ❌          |
| Calendar Years | ❌          |
| Business Years | ❌          |
| Currencies     | ✅          |
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
