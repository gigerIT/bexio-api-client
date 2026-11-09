<?php

use Bexio\BexioClient;
use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodRequest;
use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodsRequest;
use Bexio\Resources\Accounting\VatPeriods\VatPeriod;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

it('finds a VAT period by its numeric id', function () {
    $mockClient = new MockClient([
        GetVatPeriodRequest::class => MockResponse::make([
            'id' => 8,
            'start' => '2026-07-01',
            'end' => '2026-09-30',
            'type' => 'quarter',
            'status' => 'open',
            'closed_at' => null,
        ]),
    ]);

    $period = VatPeriod::useClient((new BexioClient('mock-token'))->withMockClient($mockClient))->find(8);

    $mockClient->assertSent(fn (Request $request): bool => $request->resolveEndpoint() === '/3.0/accounting/vat_periods/8');
    expect($period)->toBeInstanceOf(VatPeriod::class)
        ->and($period->id)->toBe(8)
        ->and($period->date_from)->toBe('2026-07-01')
        ->and($period->date_to)->toBe('2026-09-30')
        ->and($period->type)->toBe('quarter');
});

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
