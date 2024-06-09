<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;

it('can get Taxes', function () {
    $tax = Tax::useClient(testClient())->find(3); //id 3 is available in the test environment

    expect($tax)->toBeInstanceOf(Tax::class)
        ->and($tax->id)->toBeInt()
        ->and($tax->name)->toBeString();
});