<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\Orders\Order;

it('can get Orders', function () {
    $orders = Order::useClient(testClient())->all();

    if (count($orders) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No orders available');
    }

    expect($orders)->toBeArray()
        ->and($orders[0])->toBeInstanceOf(Order::class)
        ->and($orders[0]->id)->toBeInt();
});

it('can get an Order', function () {
    $orders = Order::useClient(testClient())->all();
    if (count($orders) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No orders available');
    }

    $order = Order::useClient(testClient())->find($orders[0]->id);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBeInt()
        ->and($order->document_nr)->toBeString();
});

it('can get first Order using query builder', function () {
    $order = Order::useClient(testClient())->query()->first();

    if (!$order) {
        \PHPUnit\Framework\Assert::markTestSkipped('No orders available');
    }

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBeInt();
});

