# Accounting response metadata

The resource DTOs retain these response fields:

| Resource | Fields |
| --- | --- |
| `Account` | `uuid` in addition to the numeric `id` |
| `CalendarYear` | `created_at`, `updated_at`, and `is_annual_reporting` |
| `Tax` | Nullable `start_month` and `end_month` alongside `start_year` and `end_year` |
| `JournalEntry` | `debit_account_id`, `credit_account_id`, `currency_id`, `base_currency_id`, `currency_factor`, `base_currency_amount`, `ref_class`, `ref_id`, and nullable `ref_uuid` |

```php
use Bexio\Resources\Accounting\Reports\JournalEntry;

$entries = JournalEntry::useClient($client)->query()->limit(10)->get();

foreach ($entries as $entry) {
    $amountInBaseCurrency = $entry->base_currency_amount;
    $sourceUuid = $entry->ref_uuid;
}
```

Calendar timestamps are response-only and are excluded when a hydrated
`CalendarYear` is reused for creation. Journal IDs retain the existing public
string representation; currency amounts and factors hydrate as floats.

Verified with live list responses on 2026-10-02. Sources:
[accounts](https://docs.bexio.com/#operation/v2ListAccounts),
[calendar years](https://docs.bexio.com/#operation/ListCalendarYears),
[taxes](https://docs.bexio.com/#operation/ListTaxes), and
[journal](https://docs.bexio.com/#operation/ListJournalEntries).

Manual-entry ownership, lock state and attachment metadata are described in
[Manual entries](manual-entries.md).
