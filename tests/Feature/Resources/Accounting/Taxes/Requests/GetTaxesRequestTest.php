<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Taxes\Requests\GetTaxesRequest;
use Bexio\Resources\Accounting\Taxes\Tax;

it('can get Taxes', function () {
    $request = new GetTaxesRequest();

    $response = testClient()->send($request);

    $taxes = $request->createDtoFromResponse($response);


    expect($taxes)->toBeArray()
        ->and($taxes[0])->toBeInstanceOf(Tax::class);

});