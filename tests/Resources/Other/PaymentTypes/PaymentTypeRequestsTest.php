<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\PaymentTypes\PaymentType;

it('can get Payment Types', function () {
    $paymentTypes = PaymentType::useClient(testClient())->all();

    expect($paymentTypes)->toBeArray()
        ->and($paymentTypes[0])->toBeInstanceOf(PaymentType::class)
        ->and($paymentTypes[0]->id)->toBeInt();
});

it('can get first Payment Type using query builder', function () {
    $paymentType = PaymentType::useClient(testClient())->query()->first();

    expect($paymentType)->toBeInstanceOf(PaymentType::class)
        ->and($paymentType->id)->toBeInt();
});

