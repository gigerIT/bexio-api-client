# VAT periods

```php
use Bexio\BexioClient;
use Bexio\Resources\Accounting\VatPeriods\VatPeriod;

$periods = VatPeriod::useClient(app(BexioClient::class))->query()->limit(10)->get();

foreach ($periods as $period) {
    // API fields start/end map to the existing public date_from/date_to properties.
    $from = $period->date_from;
    $to = $period->date_to;
    $type = $period->type; // quarter, semester, or annual
    $closedAt = $period->closed_at;
}
```

These fields are read-only. The existing `status` property represents `open`,
`closed`, or `closed_with_message`. The DTO accepts a null `closed_at`.

Contract checked 2026-10-02 against the official
[VAT period schema](https://docs.bexio.com/#operation/ShowVatPeriod).
Live verification of the date mapping and added fields remains pending because
the test account currently returns no VAT periods; see
[`docs/api-sync/`](../../api-sync/).
