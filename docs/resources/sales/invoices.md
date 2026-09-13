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

For `MwstType::INCLUDING`, `false` means prices include tax and `true` means tax is added. Both explicit booleans are preserved in the create request. Omit `mwst_is_net` or pass `null` to omit the field and let Bexio choose the default. Reporting fields and `document_nr` remain excluded from invoice creation.

See the [Bexio create invoice schema](https://docs.bexio.com/#tag/Invoices/operation/v2CreateInvoice).
