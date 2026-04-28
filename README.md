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

### Resource Guides

Detailed resource usage is documented in segmented guides under `docs/resources/` so this README stays high-level.

- [Resource guides index](docs/resources/README.md)
- [Contacts guides](docs/resources/contacts/README.md)
- [Contacts resource](docs/resources/contacts/contacts.md)
- [Orders resource](docs/resources/sales/orders.md)
- [Quotes resource](docs/resources/sales/quotes.md)

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

- **[Resource Guides Index](docs/resources/README.md)** - Entry point for segmented per-resource documentation
- **[Contacts Guides](docs/resources/contacts/README.md)** - Contacts, Contact Relations, Contact Groups, Contact Sectors, Additional Addresses, Salutations, and Titles
- **[Orders Guide](docs/resources/sales/orders.md)** - Order CRUD, search endpoint usage, and status helpers
- **[Endpoint Status Overview](#available-resources)** - Current implementation status by Bexio endpoint
- **[Legacy Contacts Redirect](docs/CONTACTS.md)** - Compatibility landing page pointing to the segmented contacts guides

### Additional Resources

- [Tests](tests/Resources) - Unit tests with practical examples

## Data Transfer Objects

DTOs provide type hinting and autocompletion in the IDE, for a better development experience.
![Type Hinting](docs/assets/contacts_typehint.png)

## Available Resources

Endpoint coverage is derived from `docs/bexio-api-docs.md`. `Implemented` means a matching request method and endpoint exists in `src/Resources/**/Requests`.

### CONTACTS

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Contacts | `GET /2.0/contact` | ✅ |
|  | `POST /2.0/contact` | ✅ |
|  | `POST /2.0/contact/search` | ✅ |
|  | `GET /2.0/contact/{contact_id}` | ✅ |
|  | `POST /2.0/contact/{contact_id}` | ✅ |
|  | `DELETE /2.0/contact/{contact_id}` | ✅ |
|  | `POST /2.0/contact/_bulk_create` | ✅ |
|  | `PATCH /2.0/contact/{contact_id}/restore` | ✅ |
| Contact Relations | `GET /2.0/contact_relation` | ✅ |
|  | `POST /2.0/contact_relation` | ✅ |
|  | `POST /2.0/contact_relation/search` | ✅ |
|  | `GET /2.0/contact_relation/{contact_relation_id}` | ✅ |
|  | `POST /2.0/contact_relation/{contact_relation_id}` | ✅ |
|  | `DELETE /2.0/contact_relation/{contact_relation_id}` | ✅ |
| Contact Groups | `GET /2.0/contact_group` | ✅ |
|  | `POST /2.0/contact_group` | ✅ |
|  | `POST /2.0/contact_group/search` | ✅ |
|  | `GET /2.0/contact_group/{contact_group_id}` | ✅ |
|  | `POST /2.0/contact_group/{contact_group_id}` | ✅ |
|  | `DELETE /2.0/contact_group/{contact_group_id}` | ✅ |
| Contact Sectors | `GET /2.0/contact_branch` | ✅ |
|  | `GET /2.0/contact_branch/{contact_branch_id}` | ✅ |
|  | `POST /2.0/contact_branch/search` | ✅ |
| Additional Addresses | `GET /2.0/contact/{contact_id}/additional_address` | ✅ |
|  | `POST /2.0/contact/{contact_id}/additional_address` | ✅ |
|  | `POST /2.0/contact/{contact_id}/additional_address/search` | ✅ |
|  | `GET /2.0/contact/{contact_id}/additional_address/{additional_address_id}` | ✅ |
|  | `POST /2.0/contact/{contact_id}/additional_address/{additional_address_id}` | ✅ |
|  | `DELETE /2.0/contact/{contact_id}/additional_address/{additional_address_id}` | ✅ |
| Salutations | `GET /2.0/salutation` | ✅ |
|  | `POST /2.0/salutation` | ✅ |
|  | `POST /2.0/salutation/search` | ✅ |
|  | `GET /2.0/salutation/{salutation_id}` | ✅ |
|  | `POST /2.0/salutation/{salutation_id}` | ✅ |
|  | `DELETE /2.0/salutation/{salutation_id}` | ✅ |
| Titles | `GET /2.0/title` | ✅ |
|  | `POST /2.0/title` | ✅ |
|  | `POST /2.0/title/search` | ✅ |
|  | `GET /2.0/title/{title_id}` | ✅ |
|  | `POST /2.0/title/{title_id}` | ✅ |
|  | `DELETE /2.0/title/{title_id}` | ✅ |

### SALES ORDER MANAGEMENT

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Quotes | `GET /2.0/kb_offer` | ✅ |
|  | `POST /2.0/kb_offer` | ✅ |
|  | `POST /2.0/kb_offer/search` | ✅ |
|  | `GET /2.0/kb_offer/{quote_id}` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}` | ✅ |
|  | `DELETE /2.0/kb_offer/{quote_id}` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/issue` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/revertIssue` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/accept` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/reject` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/reissue` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/mark_as_sent` | ✅ |
|  | `GET /2.0/kb_offer/{quote_id}/pdf` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/send` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/copy` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/order` | ✅ |
|  | `POST /2.0/kb_offer/{quote_id}/invoice` | ✅ |
| Orders | `GET /2.0/kb_order` | ✅ |
|  | `POST /2.0/kb_order` | ✅ |
|  | `POST /2.0/kb_order/search` | ✅ |
|  | `GET /2.0/kb_order/{order_id}` | ✅ |
|  | `POST /2.0/kb_order/{order_id}` | ✅ |
|  | `DELETE /2.0/kb_order/{order_id}` | ✅ |
|  | `POST /2.0/kb_order/{order_id}/delivery` | ✅ |
|  | `POST /2.0/kb_order/{order_id}/invoice` | ✅ |
|  | `GET /2.0/kb_order/{order_id}/pdf` | ✅ |
|  | `GET /2.0/kb_order/{order_id}/repetition` | ✅ |
|  | `POST /2.0/kb_order/{order_id}/repetition` | ✅ |
|  | `DELETE /2.0/kb_order/{order_id}/repetition` | ✅ |
| Deliveries | `GET /2.0/kb_delivery` | ✅ |
|  | `GET /2.0/kb_delivery/{delivery_id}` | ✅ |
|  | `POST /2.0/kb_delivery/{delivery_id}/issue` | ✅ |
| Invoices | `GET /2.0/kb_invoice` | ✅ |
|  | `POST /2.0/kb_invoice` | ✅ |
|  | `POST /2.0/kb_invoice/search` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}` | ✅ |
|  | `DELETE /2.0/kb_invoice/{invoice_id}` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/pdf` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/copy` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/issue` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/revert_issue` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/cancel` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/mark_as_sent` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/send` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/payment` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/payment` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/payment/{payment_id}` | ✅ |
|  | `DELETE /2.0/kb_invoice/{invoice_id}/payment/{payment_id}` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/kb_reminder` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/kb_reminder` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/search` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}` | ✅ |
|  | `DELETE /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_sent` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/mark_as_unsent` | ✅ |
|  | `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/send` | ✅ |
|  | `GET /2.0/kb_invoice/{invoice_id}/kb_reminder/{reminder_id}/pdf` | ✅ |
| Document Settings | `GET /2.0/kb_item_setting` | ✅ |
| Comments | `GET /2.0/{kb_document_type}/{document_id}/comment` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/comment` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/comment/{comment_id}` | ✅ |
| Default positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_custom` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_custom` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_custom/{position_id}` | ✅ |
| Item positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_article` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_article` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_article/{position_id}` | ✅ |
| Text positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_text` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_text` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_text/{position_id}` | ✅ |
| Subtotal positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_subtotal` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_subtotal` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_subtotal/{position_id}` | ✅ |
| Discount positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_discount` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_discount` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_discount/{position_id}` | ✅ |
| Pagebreak positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_pagebreak/{position_id}` | ✅ |
| Sub positions | `GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_subposition` | ✅ |
|  | `GET /2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}` | ✅ |
|  | `POST /2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}` | ✅ |
|  | `DELETE /2.0/{kb_document_type}/{document_id}/kb_position_subposition/{position_id}` | ✅ |
| Document templates | `GET /3.0/document_templates` | ✅ |

### PURCHASE

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Bills | `GET /4.0/purchase/bills` | ✅ |
|  | `POST /4.0/purchase/bills` | ✅ |
|  | `GET /4.0/purchase/bills/{id}` | ✅ |
|  | `PUT /4.0/purchase/bills/{id}` | ✅ |
|  | `DELETE /4.0/purchase/bills/{id}` | ✅ |
|  | `PUT /4.0/purchase/bills/{id}/bookings/{status}` | ✅ |
|  | `POST /4.0/purchase/bills/{id}/actions` | ✅ |
|  | `GET /4.0/purchase/documentnumbers/bills` | ✅ |
| Expenses | `GET /4.0/expenses` | ✅ |
|  | `POST /4.0/expenses` | ✅ |
|  | `GET /4.0/expenses/{id}` | ✅ |
|  | `PUT /4.0/expenses/{id}` | ✅ |
|  | `DELETE /4.0/expenses/{id}` | ✅ |
|  | `PUT /4.0/expenses/{id}/bookings/{status}` | ✅ |
|  | `POST /4.0/expenses/{id}/actions` | ✅ |
|  | `GET /4.0/expenses/documentnumbers` | ✅ |
| Purchase Orders | `GET /3.0/purchase_orders` | ✅ |
|  | `POST /3.0/purchase_orders` | ✅ |
|  | `GET /3.0/purchase_orders/{purchase_order_id}` | ✅ |
|  | `PUT /3.0/purchase_orders/{purchase_order_id}` | ✅ |
|  | `DELETE /3.0/purchase_orders/{purchase_order_id}` | ✅ |
| Outgoing Payment | `GET /4.0/purchase/outgoing-payments` | ✅ |
|  | `PUT /4.0/purchase/outgoing-payments` | ✅ |
|  | `POST /4.0/purchase/outgoing-payments` | ✅ |
|  | `GET /4.0/purchase/outgoing-payments/{id}` | ✅ |
|  | `DELETE /4.0/purchase/outgoing-payments/{id}` | ✅ |

### ACCOUNTING

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Accounts | `GET /2.0/accounts` | ✅ |
|  | `POST /2.0/accounts/search` | ✅ |
| Account Groups | `GET /2.0/account_groups` | ✅ |
|  | `GET /2.0/account_groups/{account_group_id}` | ✅ |
| Calendar Years | `GET /3.0/accounting/calendar_years` | ✅ |
|  | `POST /3.0/accounting/calendar_years` | ✅ |
|  | `POST /3.0/accounting/calendar_years/search` | ✅ |
|  | `GET /3.0/accounting/calendar_years/{calendar_year_id}` | ✅ |
| Business Years | `GET /3.0/accounting/business_years` | ✅ |
|  | `GET /3.0/accounting/business_years/{business_year_id}` | ✅ |
| Currencies | `GET /3.0/currencies` | ✅ |
|  | `POST /3.0/currencies` | ✅ |
|  | `GET /3.0/currencies/{currency_id}` | ✅ |
|  | `DELETE /3.0/currencies/{currency_id}` | ✅ |
|  | `PATCH /3.0/currencies/{currency_id}` | ✅ |
|  | `GET /3.0/currencies/{currency_id}/exchange_rates` | ✅ |
|  | `GET /3.0/currencies/codes` | ✅ |
| Manual Entries | `GET /3.0/accounting/manual_entries` | ✅ |
|  | `POST /3.0/accounting/manual_entries` | ✅ |
|  | `PUT /3.0/accounting/manual_entries/{manual_entry_id}` | ✅ |
|  | `DELETE /3.0/accounting/manual_entries/{manual_entry_id}` | ✅ |
|  | `GET /3.0/accounting/manual_entries/next_ref_nr` | ✅ |
|  | `GET /3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files` | ✅ |
|  | `POST /3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files` | ✅ |
|  | `GET /3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}` | ✅ |
|  | `DELETE /3.0/accounting/manual_entries/{manual_entry_id}/entries/{entry_id}/files/{file_id}` | ✅ |
|  | `GET /3.0/accounting/manual_entries/{manual_entry_id}/files` | ✅ |
|  | `POST /3.0/accounting/manual_entries/{manual_entry_id}/files` | ✅ |
|  | `GET /3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}` | ✅ |
|  | `DELETE /3.0/accounting/manual_entries/{manual_entry_id}/files/{file_id}` | ✅ |
| Reports | `GET /3.0/accounting/journal` | ✅ |
| Taxes | `GET /3.0/taxes` | ✅ |
|  | `GET /3.0/taxes/{tax_id}` | ✅ |
|  | `DELETE /3.0/taxes/{tax_id}` | ✅ |
| Vat Periods | `GET /3.0/accounting/vat_periods` | ✅ |
|  | `GET /3.0/accounting/vat_periods/{vat_period_id}` | ✅ |

### BANKING

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Bank Accounts | `GET /3.0/banking/accounts` | ✅ |
|  | `GET /3.0/banking/accounts/{bank_account_id}` | ✅ |
| IBAN Payments | `POST /3.0/banking/bank_accounts/{bank_account_id}/iban_payments` | ✅ |
|  | `GET /3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}` | ✅ |
|  | `PATCH /3.0/banking/bank_accounts/{bank_account_id}/iban_payments/{payment_id}` | ✅ |
| QR Payments | `POST /3.0/banking/bank_accounts/{bank_account_id}/qr_payments` | ✅ |
|  | `GET /3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}` | ✅ |
|  | `PATCH /3.0/banking/bank_accounts/{bank_account_id}/qr_payments/{payment_id}` | ✅ |
| Payments | `GET /3.0/banking/payments` | ✅ |
|  | `POST /3.0/banking/payments/{payment_id}/cancel` | ✅ |
|  | `DELETE /3.0/banking/payments/{payment_id}` | ✅ |
|  | `GET /4.0/banking/payments` | ✅ |
|  | `POST /4.0/banking/payments` | ✅ |
|  | `GET /4.0/banking/payments/{payment_id}` | ✅ |
|  | `PUT /4.0/banking/payments/{payment_id}` | ✅ |
|  | `DELETE /4.0/banking/payments/{payment_id}` | ✅ |
|  | `POST /4.0/banking/payments/{payment_id}/cancel` | ✅ |

### ITEMS & PRODUCTS

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Items | `GET /2.0/article` | ✅ |
|  | `POST /2.0/article` | ✅ |
|  | `POST /2.0/article/search` | ✅ |
|  | `GET /2.0/article/{article_id}` | ✅ |
|  | `POST /2.0/article/{article_id}` | ✅ |
|  | `DELETE /2.0/article/{article_id}` | ✅ |
| Stock locations | `GET /2.0/stock` | ✅ |
|  | `POST /2.0/stock/search` | ✅ |
| Stock Areas | `GET /2.0/stock_place` | ✅ |
|  | `POST /2.0/stock_place/search` | ✅ |

### PROJECTS & TIME TRACKING

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Projects | `GET /2.0/pr_project` | ✅ |
|  | `POST /2.0/pr_project` | ✅ |
|  | `POST /2.0/pr_project/search` | ✅ |
|  | `GET /2.0/pr_project/{project_id}` | ✅ |
|  | `POST /2.0/pr_project/{project_id}` | ✅ |
|  | `DELETE /2.0/pr_project/{project_id}` | ✅ |
|  | `POST /2.0/pr_project/{project_id}/archive` | ✅ |
|  | `POST /2.0/pr_project/{project_id}/reactivate` | ✅ |
|  | `GET /2.0/pr_project_state` | ✅ |
|  | `GET /2.0/pr_project_type` | ✅ |
|  | `GET /3.0/projects/{project_id}/milestones` | ✅ |
|  | `POST /3.0/projects/{project_id}/milestones` | ✅ |
|  | `GET /3.0/projects/{project_id}/milestones/{milestone_id}` | ✅ |
|  | `POST /3.0/projects/{project_id}/milestones/{milestone_id}` | ✅ |
|  | `DELETE /3.0/projects/{project_id}/milestones/{milestone_id}` | ✅ |
|  | `GET /3.0/projects/{project_id}/packages` | ✅ |
|  | `POST /3.0/projects/{project_id}/packages` | ✅ |
|  | `GET /3.0/projects/{project_id}/packages/{package_id}` | ✅ |
|  | `DELETE /3.0/projects/{project_id}/packages/{package_id}` | ✅ |
|  | `PATCH /3.0/projects/{project_id}/packages/{package_id}` | ✅ |
| Timesheets | `GET /2.0/timesheet` | ✅ |
|  | `POST /2.0/timesheet` | ✅ |
|  | `POST /2.0/timesheet/search` | ✅ |
|  | `GET /2.0/timesheet/{timesheet_id}` | ✅ |
|  | `POST /2.0/timesheet/{timesheet_id}` | ✅ |
|  | `DELETE /2.0/timesheet/{timesheet_id}` | ✅ |
|  | `GET /2.0/timesheet_status` | ✅ |
| Business Activities | `GET /2.0/client_service` | ✅ |
|  | `GET /2.0/client_service/{client_service_id}` | ✅ |
|  | `POST /2.0/client_service` | ✅ |
|  | `POST /2.0/client_service/search` | ✅ |
| Communication Types | `GET /2.0/communication_kind` | ✅ |
|  | `GET /2.0/communication_kind/{communication_kind_id}` | ✅ |
|  | `POST /2.0/communication_kind/search` | ✅ |

### FILES

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Files | `GET /3.0/files` | ✅ |
|  | `POST /3.0/files` | ✅ |
|  | `POST /3.0/files/search` | ✅ |
|  | `GET /3.0/files/{file_id}` | ✅ |
|  | `DELETE /3.0/files/{file_id}` | ✅ |
|  | `PATCH /3.0/files/{file_id}` | ✅ |
|  | `GET /3.0/files/{file_id}/download` | ✅ |
|  | `GET /3.0/files/{file_id}/preview` | ✅ |
|  | `GET /3.0/files/{file_id}/usage` | ✅ |

### PAYROLL

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Employees | `GET /4.0/payroll/employees` | ✅ |
|  | `POST /4.0/payroll/employees` | ✅ |
|  | `GET /4.0/payroll/employees/{employeeId}` | ✅ |
|  | `PATCH /4.0/payroll/employees/{employeeId}` | ✅ |
| Absences | `GET /4.0/payroll/employees/{employeeId}/absences` | ✅ |
|  | `POST /4.0/payroll/employees/{employeeId}/absences` | ✅ |
|  | `GET /4.0/payroll/employees/{employeeId}/absences/{absenceId}` | ✅ |
|  | `PUT /4.0/payroll/employees/{employeeId}/absences/{absenceId}` | ✅ |
|  | `DELETE /4.0/payroll/employees/{employeeId}/absences/{absenceId}` | ✅ |
| Documents | `GET /4.0/payroll/employees/{employeeId}/paystub-pdf/{year}/{month}` | ✅ |

### OTHER

| Resource | Endpoint | Implemented |
| --- | --- | --- |
| Company Profile | `GET /2.0/company_profile` | ✅ |
|  | `GET /2.0/company_profile/{profile_id}` | ✅ |
| Countries | `GET /2.0/country` | ✅ |
|  | `POST /2.0/country` | ✅ |
|  | `POST /2.0/country/search` | ✅ |
|  | `GET /2.0/country/{country_id}` | ✅ |
|  | `POST /2.0/country/{country_id}` | ✅ |
|  | `DELETE /2.0/country/{country_id}` | ✅ |
| Languages | `GET /2.0/language` | ✅ |
|  | `POST /2.0/language/search` | ✅ |
| Notes | `GET /2.0/note` | ✅ |
|  | `POST /2.0/note` | ✅ |
|  | `POST /2.0/note/search` | ✅ |
|  | `GET /2.0/note/{note_id}` | ✅ |
|  | `POST /2.0/note/{note_id}` | ✅ |
|  | `DELETE /2.0/note/{note_id}` | ✅ |
| Payment Types | `GET /2.0/payment_type` | ✅ |
|  | `POST /2.0/payment_type/search` | ✅ |
| Permissions | `GET /3.0/permissions` | ✅ |
| Tasks | `GET /2.0/task` | ✅ |
|  | `POST /2.0/task` | ✅ |
|  | `POST /2.0/task/search` | ✅ |
|  | `GET /2.0/task/{task_id}` | ✅ |
|  | `POST /2.0/task/{task_id}` | ✅ |
|  | `DELETE /2.0/task/{task_id}` | ✅ |
|  | `GET /2.0/todo_priority` | ✅ |
|  | `GET /2.0/todo_status` | ✅ |
| Units | `GET /2.0/unit` | ✅ |
|  | `POST /2.0/unit` | ✅ |
|  | `POST /2.0/unit/search` | ✅ |
|  | `GET /2.0/unit/{unit_id}` | ✅ |
|  | `POST /2.0/unit/{unit_id}` | ✅ |
|  | `DELETE /2.0/unit/{unit_id}` | ✅ |
| User Management | `GET /3.0/users` | ✅ |
|  | `GET /3.0/users/{user_id}` | ✅ |
|  | `GET /3.0/users/me` | ✅ |
|  | `GET /3.0/fictional_users` | ✅ |
|  | `POST /3.0/fictional_users` | ✅ |
|  | `GET /3.0/fictional_users/{fictional_user_id}` | ✅ |
|  | `DELETE /3.0/fictional_users/{fictional_user_id}` | ✅ |
|  | `PATCH /3.0/fictional_users/{fictional_user_id}` | ✅ |

## Testing

```sh
composer test
```

## License

MIT License - see the [LICENSE](LICENSE) file for details.
