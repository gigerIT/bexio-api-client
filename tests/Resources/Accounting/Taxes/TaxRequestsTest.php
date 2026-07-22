<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\BexioClient;
use Bexio\Resources\Accounting\Taxes\Tax;
use Bexio\Resources\Accounting\Taxes\Requests\GetTaxesRequest;
use Bexio\Resources\Accounting\Taxes\TaxQueryBuilder;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;


it('can get Taxes', function () {
    $taxes = Tax::useClient(testClient())->all();

    expect($taxes)->toBeArray()
        ->and($taxes[0])->toBeInstanceOf(Tax::class)
        ->and($taxes[0]->id)->toBeInt();
});

it('can get a Tax', function () {
    $tax = Tax::useClient(testClient())->find(3); //id 3 is available in the test environment

    expect($tax)->toBeInstanceOf(Tax::class)
        ->and($tax->id)->toBeInt()
        ->and($tax->name)->toBeString();
});

it('provides an active sale tax for sales document tests', function () {
    $tax = testSaleTax();

    expect($tax->type)->toBe('sales_tax')
        ->and($tax->is_active)->toBeTrue();
});

it('forwards pagination and tax filters on tax index queries', function () {
    $mockClient = new MockClient([
        GetTaxesRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $query = Tax::useClient($client)->query();

    expect($query)->toBeInstanceOf(TaxQueryBuilder::class);

    $query
        ->types('sales_tax')
        ->withInactive()
        ->date('2018-03-17')
        ->limit(1)
        ->offset(2)
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof GetTaxesRequest
            && ($query['types'] ?? null) === 'sales_tax'
            && array_key_exists('scope', $query)
            && $query['scope'] === null
            && ($query['date'] ?? null) === '2018-03-17'
            && ($query['limit'] ?? null) === 1
            && ($query['offset'] ?? null) === 2;
    });
});

it('limits live tax index queries', function () {
    $taxes = Tax::useClient(testClient())->query()->limit(1)->get();

    expect($taxes)->toBeArray()
        ->and(count($taxes))->toBeLessThanOrEqual(1);
});
