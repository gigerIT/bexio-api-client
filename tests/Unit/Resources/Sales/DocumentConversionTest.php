<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\DocumentConversionPosition;
use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\Requests\CreateDeliveryFromOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\CreateInvoiceFromOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRequest;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Resources\Sales\Quotes\Requests\CreateInvoiceFromQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CreateOrderFromQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuoteRequest;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('serializes document conversion positions with bexio position types', function () {
    $position = new DocumentConversionPosition(
        id: 123,
        type: ItemPositionType::ARTICLE,
        amount: '2.5',
    );

    expect($position->toPayload())->toBe([
        'id' => 123,
        'type' => 'KbPositionArticle',
        'amount' => '2.5',
    ]);
});

it('creates an order from a quote without explicit positions', function () {
    $mockClient = new MockClient([
        GetQuoteRequest::class => MockResponse::make([
            'id' => 123,
            'positions' => [
                [
                    'id' => 987,
                    'type' => 'KbPositionCustom',
                ],
            ],
        ]),
        CreateOrderFromQuoteRequest::class => MockResponse::make(['id' => 456]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $order = Quote::useClient($client)->createOrder(123);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBe(456);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateOrderFromQuoteRequest
            && $request->resolveEndpoint() === '/2.0/kb_offer/123/order'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '1',
                    ],
                ],
            ];
    });
});

it('creates an order from loaded quote positions without fetching the quote', function () {
    $mockClient = new MockClient([
        CreateOrderFromQuoteRequest::class => MockResponse::make(['id' => 456]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $quote = (new Quote(
        id: 123,
        positions: new Collection([
            ItemPosition::fromApiPayload([
                'id' => 987,
                'type' => 'KbPositionCustom',
                'amount' => '2.5',
            ]),
        ]),
    ))->attachClient($client);

    $order = $quote->createOrder();

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBe(456);

    $mockClient->assertNotSent(GetQuoteRequest::class);
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateOrderFromQuoteRequest
            && $request->resolveEndpoint() === '/2.0/kb_offer/123/order'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '2.5',
                    ],
                ],
            ];
    });
});

it('creates an invoice from a quote with selected positions', function () {
    $mockClient = new MockClient([
        CreateInvoiceFromQuoteRequest::class => MockResponse::make(['id' => 456, 'is_valid_from' => '2026-04-26']),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $invoice = Quote::useClient($client)->createInvoice(123, [
        new DocumentConversionPosition(987, ItemPositionType::ARTICLE, 3),
    ]);

    expect($invoice)->toBeInstanceOf(Invoice::class)
        ->and($invoice->id)->toBe(456);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateInvoiceFromQuoteRequest
            && $request->resolveEndpoint() === '/2.0/kb_offer/123/invoice'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionArticle',
                        'amount' => 3,
                    ],
                ],
            ];
    });
});

it('creates an invoice from loaded quote positions without fetching the quote', function () {
    $mockClient = new MockClient([
        CreateInvoiceFromQuoteRequest::class => MockResponse::make(['id' => 456, 'is_valid_from' => '2026-04-26']),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $quote = (new Quote(
        id: 123,
        positions: new Collection([
            ItemPosition::fromApiPayload([
                'id' => 987,
                'type' => 'KbPositionCustom',
                'amount' => '2.5',
            ]),
        ]),
    ))->attachClient($client);

    $invoice = $quote->createInvoice();

    expect($invoice)->toBeInstanceOf(Invoice::class)
        ->and($invoice->id)->toBe(456);

    $mockClient->assertNotSent(GetQuoteRequest::class);
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateInvoiceFromQuoteRequest
            && $request->resolveEndpoint() === '/2.0/kb_offer/123/invoice'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '2.5',
                    ],
                ],
            ];
    });
});

it('creates a delivery from an order without explicit positions', function () {
    $mockClient = new MockClient([
        GetOrderRequest::class => MockResponse::make([
            'id' => 123,
            'positions' => [
                [
                    'id' => 987,
                    'type' => 'KbPositionCustom',
                    'tax_id' => 4,
                    'amount' => '2.5',
                ],
            ],
        ]),
        CreateDeliveryFromOrderRequest::class => MockResponse::make(['id' => 456]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $delivery = Order::useClient($client)->createDelivery(123);

    expect($delivery)->toBeInstanceOf(Delivery::class)
        ->and($delivery->id)->toBe(456);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateDeliveryFromOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/delivery'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '2.5',
                    ],
                ],
            ];
    });
});

it('creates a delivery from loaded order positions without fetching the order', function () {
    $mockClient = new MockClient([
        CreateDeliveryFromOrderRequest::class => MockResponse::make(['id' => 456]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $order = (new Order(
        id: 123,
        positions: new ItemPositionCollection([
            ItemPosition::fromApiPayload([
                'id' => 987,
                'type' => 'KbPositionCustom',
                'amount' => '2.5',
            ]),
        ]),
    ))->attachClient($client);

    $delivery = $order->createDelivery();

    expect($delivery)->toBeInstanceOf(Delivery::class)
        ->and($delivery->id)->toBe(456);

    $mockClient->assertNotSent(GetOrderRequest::class);
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateDeliveryFromOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/delivery'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '2.5',
                    ],
                ],
            ];
    });
});

it('creates an invoice from an order with selected positions', function () {
    $mockClient = new MockClient([
        CreateInvoiceFromOrderRequest::class => MockResponse::make(['id' => 456, 'is_valid_from' => '2026-04-26']),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $invoice = Order::useClient($client)->createInvoice(123, [
        new DocumentConversionPosition(987, ItemPositionType::ARTICLE, 3),
    ]);

    expect($invoice)->toBeInstanceOf(Invoice::class)
        ->and($invoice->id)->toBe(456);

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateInvoiceFromOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/invoice'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionArticle',
                        'amount' => 3,
                    ],
                ],
            ];
    });
});

it('creates an invoice from loaded order positions without fetching the order', function () {
    $mockClient = new MockClient([
        CreateInvoiceFromOrderRequest::class => MockResponse::make(['id' => 456, 'is_valid_from' => '2026-04-26']),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $order = (new Order(
        id: 123,
        positions: new ItemPositionCollection([
            ItemPosition::fromApiPayload([
                'id' => 987,
                'type' => 'KbPositionCustom',
                'amount' => '2.5',
            ]),
        ]),
    ))->attachClient($client);

    $invoice = $order->createInvoice();

    expect($invoice)->toBeInstanceOf(Invoice::class)
        ->and($invoice->id)->toBe(456);

    $mockClient->assertNotSent(GetOrderRequest::class);
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof CreateInvoiceFromOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/invoice'
            && json_decode($request->body()->all(), true) === [
                'positions' => [
                    [
                        'id' => 987,
                        'type' => 'KbPositionCustom',
                        'amount' => '2.5',
                    ],
                ],
            ];
    });
});
