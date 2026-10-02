<?php

use Bexio\BexioClient;
use Bexio\Resources\Payroll\Documents\Requests\DownloadPaystubPdfRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('downloads paystub PDF bytes without JSON decoding or following a location', function () {
    $pdf = "%PDF-1.7\n\x00\xff\n%%EOF";
    $mock = new MockClient([
        DownloadPaystubPdfRequest::class => MockResponse::make($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=paystub.pdf',
        ]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);

    $response = $client->send(new DownloadPaystubPdfRequest(
        '497f6eca-6276-4993-bfeb-53cbbbba6f08', 2026, 9,
    ));

    expect($response->body())->toBe($pdf)
        ->and($response->header('Content-Type'))->toBe('application/pdf');

    $mock->assertSent(fn (DownloadPaystubPdfRequest $request): bool =>
        $request->getMethod() === Method::GET
        && $request->resolveEndpoint() === '/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/paystub-pdf-download/2026/9'
        && $request->query()->all() === []
    );
    $mock->assertSentCount(1);
});
