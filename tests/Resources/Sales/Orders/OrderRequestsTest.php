<?php

use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Orders\Enums\OrderStatus;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Support\Data\SearchCriteria;

$testOrder = null;

it('can create an Order', function () use (&$testOrder) {
    $testOrder = new Order(
        title: sprintf('Test Order %s', uniqid()),
        contact_id: 1,
        is_valid_from: date('Y-m-d'),
        is_valid_to: date('Y-m-d', strtotime('+14 days')),
    );

    $salesAccount = testSalesAccount();

    $testOrder->positions->add(
        new ItemPositionCustom(
            tax_id: $salesAccount->tax_id,
            account_id: $salesAccount->id,
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        )
    );

    $testOrder = $testOrder->attachClient(testClient())->create();

    expect($testOrder)->toBeInstanceOf(Order::class)
        ->and($testOrder->id)->toBeInt()
        ->and($testOrder->kb_item_status_id)->toBe(OrderStatus::PENDING->value);
});

it('can get Orders', function () use (&$testOrder) {
    $orders = Order::useClient(testClient())->all();

    expect($orders)->toBeArray()
        ->and($orders[0])->toBeInstanceOf(Order::class)
        ->and($orders[0]->id)->toBeInt()
        ->and(array_map(static fn (Order $order): ?int => $order->id, $orders))->toContain($testOrder->id);
})->depends('it can create an Order');

it('can paginate and sort Orders via the index endpoint', function () use (&$testOrder) {
    $orders = Order::useClient(testClient())
        ->query()
        ->forPage(1, 1)
        ->orderBy('id', 'desc')
        ->get();

    expect($orders)->toHaveCount(1)
        ->and($orders[0])->toBeInstanceOf(Order::class)
        ->and($orders[0]->id)->toBe($testOrder->id);
})->depends('it can create an Order');

it('can get an Order', function () use (&$testOrder) {
    $order = Order::useClient(testClient())->find($testOrder->id);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBeInt()
        ->and($order->document_nr)->toBeString();
})->depends('it can create an Order');

it('can find an Order via the search endpoint', function () use (&$testOrder) {
    $order = Order::useClient(testClient())->find($testOrder->id);

    $orders = Order::useClient(testClient())
        ->query()
        ->status(OrderStatus::PENDING)
        ->validFrom($order->is_valid_from)
        ->where('id', SearchCriteria::EQUAL, $order->id)
        ->orderBy('id', 'desc')
        ->limit(100)
        ->get();

    expect($orders)->toBeArray()
        ->and($orders[0])->toBeInstanceOf(Order::class)
        ->and(array_map(static fn (Order $order): ?int => $order->id, $orders))->toContain($testOrder->id);
})->depends('it can create an Order');

it('can get first Order using query builder', function () {
    $order = Order::useClient(testClient())->query()->first();

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBeInt();
})->depends('it can create an Order');

it('can delete an Order', function () use (&$testOrder) {
    $response = $testOrder->attachClient(testClient())->delete();

    expect($response)->toBeTrue();
})->depends('it can create an Order', 'it can find an Order via the search endpoint');

