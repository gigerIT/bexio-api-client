<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;

it('can get Taxes', function () {
    $taxes = Tax::useClient(testClient())->all();

//    dump($taxes);

    expect($taxes)->toBeArray()
        ->and($taxes[0])->toBeInstanceOf(Tax::class)
        ->and($taxes[0]->id)->toBeInt();
});