<?php

use Bexio\BexioClient;
use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodRequest;
use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodsRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('hydrates VAT dates and annual reporting periods from index and show responses', function () {
    $payload = [
        'id' => 3,
        'start' => '2026-01-01',
        'end' => '2026-12-31',
        'type' => 'annual',
        'status' => 'open',
        'closed_at' => null,
    ];
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        GetVatPeriodsRequest::class => MockResponse::make([$payload]),
        GetVatPeriodRequest::class => MockResponse::make($payload),
    ]));
    $index = new GetVatPeriodsRequest();
    $show = new GetVatPeriodRequest(3);

    foreach ([$index->createDtoFromResponse($client->send($index))[0], $show->createDtoFromResponse($client->send($show))] as $period) {
        expect($period->date_from)->toBe('2026-01-01')
            ->and($period->date_to)->toBe('2026-12-31')
            ->and($period->type)->toBe('annual')
            ->and($period->closed_at)->toBeNull();
    }
});
