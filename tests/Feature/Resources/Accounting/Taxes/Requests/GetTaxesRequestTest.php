<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;

it('can get Taxes', function () {
    $taxes = Tax::useClient(testClient())->all();

    expect($taxes)->toBeArray()
        ->and($taxes[0])->toBeInstanceOf(Tax::class);

});