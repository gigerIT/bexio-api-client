# Payroll documents

Download a paystub directly as PDF bytes:

```php
use Bexio\BexioClient;
use Bexio\Resources\Payroll\Documents\Requests\DownloadPaystubPdfRequest;

$response = app(BexioClient::class)->send(
    new DownloadPaystubPdfRequest($employeeId, 2026, 9),
);

$pdf = $response->body();
```

The employee ID is a payroll employee UUID. The year and month identify the
paystub period. OAuth integrations require `ApiScope::PAYROLL_PAYSTUB_SHOW`.
The response is `application/pdf`; use `body()` or Saloon's response stream,
not `json()` or the `PaystubPdf` DTO.

`GetPaystubPdfRequest` remains available for existing integrations and returns a
`PaystubPdf` with a `location` URL. Bexio deprecated that endpoint on 2026-05-26
in favor of the direct download. Migrate by switching to
`DownloadPaystubPdfRequest` and consuming the response body.

Contract checked 2026-10-02 against the official
[download endpoint](https://docs.bexio.com/#operation/downloadPaystubPdf) and
[deprecated location endpoint](https://docs.bexio.com/#operation/getPdfForEmployeeInMonth).
The configured trial account returns HTTP 403 when listing payroll employees,
so the direct download is covered by the explicitly accepted contract-test
exception. Live success still requires a payroll-enabled account. Exact method, path and
binary-response handling are tested with mocked responses. See
[`docs/api-sync/`](../../api-sync/).
