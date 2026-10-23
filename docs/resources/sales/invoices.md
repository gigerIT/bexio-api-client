# Invoices

## Net and gross prices

Set `mwst_is_net` explicitly when creating an invoice whose pricing mode must be independent of the Bexio account default:

```php
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\MwstType;

$invoice = new Invoice(
    contact_id: $contactId,
    mwst_type: MwstType::INCLUDING,
    mwst_is_net: false,
);
// Add positions and other invoice fields before creating.
$created = $invoice->attachClient($client)->create();
```

For `MwstType::INCLUDING`, `false` means prices include tax and `true` means tax is added. Both explicit booleans are preserved in create and update requests. Omit `mwst_is_net` or pass `null` to leave the field out and let Bexio choose the default; Bexio rejects an explicit `null`. Reporting fields and `document_nr` remain excluded from invoice writes. Orders and quotes follow the same rule through their `mwst_is_net` property.

See the [Bexio create invoice schema](https://docs.bexio.com/#tag/Invoices/operation/v2CreateInvoice).
