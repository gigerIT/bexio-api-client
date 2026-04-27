<?php

use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionType;
use Bexio\Resources\Sales\Orders\Enums\OrderStatus;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\OrderRepetition;
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
        ->and($orders[0]->id)->toBeGreaterThanOrEqual($testOrder->id);
})->depends('it can create an Order');

it('can get an Order', function () use (&$testOrder) {
    $order = Order::useClient(testClient())->find($testOrder->id);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBeInt()
        ->and($order->document_nr)->toBeString();
})->depends('it can create an Order');

it('can update an Order', function () use (&$testOrder) {
    $order = Order::useClient(testClient())->find($testOrder->id);
    $order->title = sprintf('Updated Order %s', uniqid());

    $testOrder = $order->attachClient(testClient())->save();

    expect($testOrder)->toBeInstanceOf(Order::class)
        ->and($testOrder->id)->toBe($order->id)
        ->and($testOrder->title)->toBe($order->title);
})->depends('it can create an Order');

it('can get an Order PDF', function () use (&$testOrder) {
    $pdf = $testOrder->attachClient(testClient())->pdf();

    expect($pdf->mime)->toBe('application/pdf')
        ->and($pdf->name)->toEndWith('.pdf')
        ->and($pdf->decodedContent())->toStartWith('%PDF');
})->depends('it can create an Order');

it('can manage an Order repetition', function () use (&$testOrder) {
    $repetition = OrderRepetition::daily(
        start: date('Y-m-d', strtotime('+1 day')),
        end: date('Y-m-d', strtotime('+1 month')),
        interval: 1,
    );

    try {
        $updated = $testOrder->attachClient(testClient())->updateRepetition($repetition);
        $fetched = $testOrder->attachClient(testClient())->getRepetition();

        expect($updated)->toBeInstanceOf(OrderRepetition::class)
            ->and($fetched)->toBeInstanceOf(OrderRepetition::class)
            ->and($fetched->repetition->type)->toBe(OrderRepetitionType::DAILY);
    } finally {
        $testOrder->attachClient(testClient())->deleteRepetition();
    }
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

it('can create an Order with an article position and convert it to an Invoice', function () {
    $client = testClient();
    $createdOrder = null;
    $createdInvoice = null;

    try {
        $items = Item::useClient($client)->all();
    } catch (Throwable $exception) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $exception->getMessage());
    }

    $item = collect($items)->first(fn (Item $item): bool => $item->id !== null && $item->unit_id !== null);

    if (! $item instanceof Item) {
        \PHPUnit\Framework\Assert::markTestSkipped('No item with a unit is available for article-position order testing.');
    }

    $salesAccount = testSalesAccount();
    $text = $item->intern_name !== '' ? $item->intern_name : ($item->intern_code !== '' ? $item->intern_code : 'Article position');

    try {
        $order = new Order(
            title: sprintf('Article Position Order %s', uniqid()),
            contact_id: 1,
            is_valid_from: date('Y-m-d'),
            positions: new ItemPositionCollection([
                new ItemPositionArticle(
                    amount: '1',
                    unit_id: $item->unit_id,
                    account_id: $salesAccount->id,
                    tax_id: $salesAccount->tax_id,
                    text: $text,
                    unit_price: '123.45',
                    article_id: $item->id,
                    discount_in_percent: '0',
                ),
            ]),
        );

        $createdOrder = $order->attachClient($client)->create();
        $articlePosition = $createdOrder->positions
            ->first(fn ($position): bool => $position instanceof ItemPositionArticle);

        expect($createdOrder)->toBeInstanceOf(Order::class)
            ->and($createdOrder->id)->toBeInt()
            ->and($articlePosition)->toBeInstanceOf(ItemPositionArticle::class)
            ->and($articlePosition->article_id)->toBe($item->id);

        $createdInvoice = $createdOrder->attachClient($client)->createInvoice();

        expect($createdInvoice)->toBeInstanceOf(Invoice::class)
            ->and($createdInvoice->id)->toBeInt()
            ->and($createdInvoice->contact_id)->toBe($createdOrder->contact_id);
    } finally {
        if ($createdInvoice instanceof Invoice) {
            try {
                $createdInvoice->attachClient($client)->delete();
            } catch (Throwable) {
                // Cleanup failures should not hide the regression assertion result.
            }
        }

        if ($createdOrder instanceof Order) {
            try {
                $createdOrder->attachClient($client)->delete();
            } catch (Throwable) {
                // Cleanup failures should not hide the regression assertion result.
            }
        }
    }
});

it('can delete an Order', function () use (&$testOrder) {
    $response = $testOrder->attachClient(testClient())->delete();

    expect($response)->toBeTrue();
})->depends('it can create an Order', 'it can find an Order via the search endpoint');

