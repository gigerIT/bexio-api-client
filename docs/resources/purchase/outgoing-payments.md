# Outgoing payments

Lists require a bill UUID:

```php
use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;

$payments = OutgoingPayment::useClient($client)
    ->query()->forBill($billId)->forPage(1, 20)->get();
```

The API uses `page`, `limit`, `order` and `sort`. The client extracts the `data`
array from the paginated response and preserves `created_at` and
`banking_payment_entry_id` as response metadata.

Creation supports manual, IBAN, QR and cash-discount payments. Updates use
`PUT /4.0/purchase/outgoing-payments` with `payment_id` in the body. The live API
allows updates only for IBAN and QR payments. A manual payment must be deleted
and recreated to change it. Financial-year and bill-state constraints still
apply; the API reports them as request exceptions.

[Official contract](https://docs.bexio.com/#operation/ApiOutgoingPaymentList_GET),
reviewed 2026-10-02. Tests create their own supplier and bill, and remove every
payment before returning the bill to draft and deleting it.
