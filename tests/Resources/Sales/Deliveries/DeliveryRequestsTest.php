<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\Deliveries\Delivery;
use PHPUnit\Framework\Assert;

it('can get Deliveries', function () {
    $deliveries = Delivery::useClient(testClient())->all();

    if (count($deliveries) === 0) {
        Assert::markTestSkipped('No deliveries available');
    }

    expect($deliveries)->toBeArray()
        ->and($deliveries[0])->toBeInstanceOf(Delivery::class)
        ->and($deliveries[0]->id)->toBeInt();
});

it('can get a Delivery', function () {
    $deliveries = Delivery::useClient(testClient())->all();
    if (count($deliveries) === 0) {
        Assert::markTestSkipped('No deliveries available');
    }

    $delivery = Delivery::useClient(testClient())->find($deliveries[0]->id);

    expect($delivery)->toBeInstanceOf(Delivery::class)
        ->and($delivery->id)->toBeInt()
        ->and($delivery->document_nr)->toBeString();
});

it('can get first Delivery using query builder', function () {
    $delivery = Delivery::useClient(testClient())->query()->first();

    if (! $delivery) {
        Assert::markTestSkipped('No deliveries available');
    }

    expect($delivery)->toBeInstanceOf(Delivery::class)
        ->and($delivery->id)->toBeInt();
});
