# Invoice Reminders

`InvoiceReminder` is a nested sales resource for `GET`, `POST`, and `DELETE /2.0/kb_invoice/{invoice_id}/kb_reminder` plus `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/search`.

## Setup

```php
use Bexio\BexioClient;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Bexio\Support\Data\SearchCriteria;

$client = app(BexioClient::class);
```

## List And Search Reminders

```php
$reminders = InvoiceReminder::useClient($client)
    ->query()
    ->forInvoice(123)
    ->get();

$matching = InvoiceReminder::useClient($client)
    ->query()
    ->forInvoice(123)
    ->where('reminder_level', SearchCriteria::EQUAL, '1')
    ->get();
```

## Create And Delete A Reminder

```php
$reminder = new InvoiceReminder(kb_invoice_id: 123);

$created = $reminder->attachClient($client)->create();

$created->delete();
```

## Notes

- Invoice reminders are invoice-scoped. Call `forInvoice($invoiceId)` on the query builder before `get()` or filtered searches.
- `find()` and `delete()` require `kb_invoice_id` on the reminder instance because the API route needs both the invoice id and the reminder id.
- The search endpoint is nested under the invoice: `POST /2.0/kb_invoice/{invoice_id}/kb_reminder/search`.
