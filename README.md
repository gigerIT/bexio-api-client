# Bexio API Laravel Package

A Laravel package for the [Bexio API](https://docs.bexio.com), built with [`saloonphp/saloon`](https://docs.saloon.dev/) as API connector and [`spatie/laravel-data`](https://github.com/spatie/laravel-data) for DTOs.

## Requirements

- PHP 8.2+
- Laravel 10.x, 11.x, 12.x, or 13.x

## Installation

```sh
composer require gigerit/bexio-api-client
```

The package will automatically register its service provider.

### Publish Configuration

```sh
php artisan vendor:publish --tag=bexio-config
```

This will create a `config/bexio.php` configuration file.

### Environment Variables

Add your Bexio API credentials to your `.env` file:

```env
# For Personal Access Token (simplest method)
BEXIO_ACCESS_TOKEN=your-access-token

# For OAuth2 (user-based authentication)
BEXIO_CLIENT_ID=your-client-id
BEXIO_CLIENT_SECRET=your-client-secret
BEXIO_REDIRECT_URI=https://your-app.com/bexio/callback

# Optional: persisted OAuth tokens
BEXIO_OAUTH_ACCESS_TOKEN=your-oauth-access-token
BEXIO_OAUTH_REFRESH_TOKEN=your-oauth-refresh-token
```

## Quick Start

### Using Dependency Injection

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;

class ContactController extends Controller
{
    public function index(BexioClient $client)
    {
        $contacts = Contact::useClient($client)->all();

        return view('contacts.index', compact('contacts'));
    }

    public function show(BexioClient $client, int $id)
    {
        $contact = Contact::useClient($client)->find($id);

        return view('contacts.show', compact('contact'));
    }
}
```

### Using the Facade

```php
use Bexio\Facades\Bexio;
use Bexio\Resources\Contacts\Contacts\Contact;

// Get all contacts
$contacts = Contact::useClient(Bexio::getFacadeRoot())->all();

// Or resolve the client directly
$client = app('bexio');
$contacts = Contact::useClient($client)->all();
```

### Basic Contact Operations

Get a Contact by ID:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;

$client = app(BexioClient::class);

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
use Bexio\Resources\Contacts\Contacts\Contact;

$client = app(BexioClient::class);

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
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;

$client = app(BexioClient::class);

// Create a new Person Contact
$contact = new Contact(
    contact_type_id: ContactType::PERSON,
    name_1: 'Doe',              // Last name
    name_2: 'John',             // First name
    street_name: 'Main Street',
    house_number: '123',
    postcode: '8000',
    city: 'Zurich',
    country_id: 1,
    mail: 'john.doe@example.com',
    user_id: 1,
    owner_id: 1,
);

// Save the Contact
$contact->attachClient($client)->save();
```

Note: if you need to assign a contact title, use the `titel_id` field name. That matches the payload shape used by this package even though some Bexio docs refer to `title_id`.

Update a Contact:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;

$client = app(BexioClient::class);

// Get the Contact with ID 1
$contact = Contact::useClient($client)->find(1);

// Update the Contact properties
$contact->name_2 = 'Jane';
$contact->mail = 'jane.doe@example.com';

// Send the changes back to bexio
$contact->save();
```

Search Contacts:

```php
use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);

// Search contacts with criteria
$contacts = Contact::useClient($client)
    ->query()
    ->where('name_1', SearchCriteria::LIKE, 'John')
    ->where('city', SearchCriteria::EQUAL, 'Zurich')
    ->get();
```

## OAuth2 Authentication

For user-based authentication where users authenticate with their own Bexio account:

### 1. Generate Authorization URL

```php
use Bexio\BexioAuth;
use Illuminate\Support\Str;

class BexioAuthController extends Controller
{
    public function redirect()
    {
        $auth = new BexioAuth(
            config('bexio.oauth.client_id'),
            config('bexio.oauth.client_secret'),
            config('bexio.oauth.redirect_uri')
        );

        $state = Str::random(40);

        session()->put('bexio_state', $state);

        $url = $auth->getAuthorizationUrl(
            scopes: config('bexio.scopes'),
            state: $state
        );

        return redirect($url);
    }
}
```

### 2. Handle Callback

```php
use Bexio\BexioAuth;

public function callback(Request $request)
{
    $code = $request->get('code');
    $state = $request->get('state');

    if ($state !== session('bexio_state')) {
        abort(403, 'Invalid state');
    }

    $auth = new BexioAuth(
        config('bexio.oauth.client_id'),
        config('bexio.oauth.client_secret'),
        config('bexio.oauth.redirect_uri')
    );

    $authenticator = $auth->getAccessToken($code, $state, session('bexio_state'));

    // Store the tokens (serialize the $authenticator or store individual values)
    auth()->user()->update([
        'bexio_access_token' => $authenticator->getAccessToken(),
        'bexio_refresh_token' => $authenticator->getRefreshToken(),
        'bexio_expires_at' => $authenticator->getExpiresAt(),
    ]);

    return redirect()->route('dashboard');
}
```

### 3. Use with Per-User Authentication

```php
use Bexio\BexioAuth;
use DateTimeImmutable;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\BexioClient;
use Saloon\Http\Auth\AccessTokenAuthenticator;

public function getContacts()
{
    $user = auth()->user();

    $authService = new BexioAuth(
        config('bexio.oauth.client_id'),
        config('bexio.oauth.client_secret'),
        config('bexio.oauth.redirect_uri')
    );

    $auth = new AccessTokenAuthenticator(
        $user->bexio_access_token,
        $user->bexio_refresh_token,
        new DateTimeImmutable($user->bexio_expires_at)
    );

    if ($auth->hasExpired()) {
        $auth = $authService->refreshAccessToken($auth);

        $user->update([
            'bexio_access_token' => $auth->getAccessToken(),
            'bexio_refresh_token' => $auth->getRefreshToken(),
            'bexio_expires_at' => $auth->getExpiresAt(),
        ]);
    }

    $client = new BexioClient($auth->getAccessToken());

    return Contact::useClient($client)->all();
}
```

## Documentation

For detailed documentation and advanced usage examples, see:

### Resource Guides

- **[Contacts Documentation](docs/CONTACTS.md)** - Comprehensive guide for Contacts, Contact Relations, Contact Groups, Contact Sectors, Additional Addresses, Salutations, and Titles

### Additional Resources

- [Tests](tests/Resources) - Unit tests with practical examples

## Data Transfer Objects

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
![Type Hinting](docs/assets/contacts_typehint.png)

## Available Resources

### CONTACTS

| Resource             | Implemented |
| -------------------- | ----------- |
| Contacts             | ✅          |
| Contact Relations    | ✅          |
| Contact Groups       | ✅          |
| Contact Sectors      | ✅          |
| Additional Addresses | ✅          |
| Salutations          | ✅          |
| Titles               | ✅          |

### SALES ORDER MANAGEMENT

| Resource            | Implemented |
| ------------------- | ----------- |
| Quotes              | ✅          |
| Orders              | ✅          |
| Deliveries          | ✅          |
| Invoices            | ✅          |
| Document Settings   | ✅          |
| Comments            | ✅          |
| Default positions   | ✅          |
| Item positions      | ✅          |
| Text positions      | ✅          |
| Subtotal positions  | ✅          |
| Discount positions  | ✅          |
| Pagebreak positions | ✅          |
| Sub positions       | ✅          |
| Document templates  | ✅          |

### PURCHASE

| Resource         | Implemented |
| ---------------- | ----------- |
| Bills            | ✅          |
| Expenses         | ✅          |
| Purchase Orders  | ✅          |
| Outgoing Payment | ✅          |

### ACCOUNTING

| Resource       | Implemented |
| -------------- | ----------- |
| Accounts       | ✅          |
| Account Groups | ✅          |
| Calendar Years | ✅          |
| Business Years | ✅          |
| Currencies     | ✅          |
| Manual Entries | ✅          |
| Reports        | ✅          |
| Taxes          | ✅          |
| Vat Periods    | ✅          |

### BANKING

| Resource      | Implemented |
| ------------- | ----------- |
| Bank Accounts | ✅          |
| IBAN Payments | ✅          |
| QR Payments   | ✅          |
| Payments      | ✅          |

### ITEMS & PRODUCTS

| Resource        | Implemented |
| --------------- | ----------- |
| Items           | ✅          |
| Stock locations | ✅          |
| Stock Areas     | ✅          |

### PROJECTS & TIME TRACKING

| Resource            | Implemented |
| ------------------- | ----------- |
| Projects            | ✅          |
| Timesheets          | ✅          |
| Business Activities | ✅          |
| Communication Types | ✅          |

### FILES

| Resource | Implemented |
| -------- | ----------- |
| Files    | ✅          |

### OTHER

| Resource        | Implemented |
| --------------- | ----------- |
| Company Profile | ✅          |
| Countries       | ✅          |
| Languages       | ✅          |
| Notes           | ✅          |
| Payment Types   | ✅          |
| Permissions     | ✅          |
| Tasks           | ✅          |
| Units           | ✅          |
| User Management | ✅          |

## Testing

```sh
composer test
```

## License

MIT License - see the [LICENSE](LICENSE) file for details.
