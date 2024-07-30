<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;


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