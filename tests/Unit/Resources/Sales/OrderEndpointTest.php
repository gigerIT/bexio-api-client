<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemPositionRequest;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionMonthlySchedule;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionWeekday;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\OrderRepetition;
use Bexio\Resources\Sales\Orders\Requests\CreateOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\DeleteOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\DeleteOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderPdfRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\UpdateOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\UpdateOrderRequest;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('serializes order repetition payloads with helper enums', function () {
    $repetition = OrderRepetition::weekly(
        start: '2026-05-01',
        end: '2026-06-01',
        interval: 2,
        weekdays: [
            OrderRepetitionWeekday::MONDAY,
            OrderRepetitionWeekday::FRIDAY,
        ],
    );

    expect($repetition->toPayload())->toBe([
        'start' => '2026-05-01',
        'end' => '2026-06-01',
        'repetition' => [
            'type' => 'weekly',
            'interval' => 2,
            'weekdays' => ['monday', 'friday'],
        ],
    ]);
});

it('rejects malformed order repetition API payloads', function (array $payload, string $message) {
    expect(fn () => OrderRepetition::fromApiPayload($payload))
        ->toThrow(UnexpectedValueException::class, $message);
})->with([
    'missing start' => [
        ['repetition' => ['type' => 'daily', 'interval' => 1]],
        'Order repetition response field "start" must be a string.',
    ],
    'non-string start' => [
        ['start' => 20260501, 'repetition' => ['type' => 'daily', 'interval' => 1]],
        'Order repetition response field "start" must be a string.',
    ],
    'missing repetition' => [
        ['start' => '2026-05-01'],
        'Order repetition response field "repetition" must be an array.',
    ],
    'non-array repetition' => [
        ['start' => '2026-05-01', 'repetition' => 'daily'],
        'Order repetition response field "repetition" must be an array.',
    ],
    'non-string end' => [
        ['start' => '2026-05-01', 'end' => 20261231, 'repetition' => ['type' => 'daily', 'interval' => 1]],
        'Order repetition response field "end" must be a string or null.',
    ],
]);

it('updates an order through the resource save API', function () {
    $mockClient = new MockClient([
        UpdateOrderRequest::class => MockResponse::make([
            'id' => 123,
            'title' => 'Updated order title',
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $order = (new Order(
        id: 123,
        title: 'Updated order title',
        contact_id: 1,
        is_valid_from: '2026-05-01',
    ))->attachClient($client);

    $updated = $order->save();

    expect($updated)->toBeInstanceOf(Order::class)
        ->and($updated->id)->toBe(123)
        ->and($updated->title)->toBe('Updated order title');

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $body = $request->body()->all();

        return $request instanceof UpdateOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123'
            && $body['title'] === 'Updated order title'
            && ! array_key_exists('id', $body)
            && ! array_key_exists('positions', $body);
    });
});

it('creates orders with article positions through the item position endpoint', function () {
    $articlePositionPayload = [
        'id' => 456,
        'type' => 'KbPositionArticle',
        'amount' => '1.000000',
        'unit_id' => 1,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Article position',
        'unit_price' => '123.450000',
        'article_id' => 99,
        'discount_in_percent' => '0.000000',
    ];
    $customPositionPayload = [
        'id' => 457,
        'type' => 'KbPositionCustom',
        'amount' => '2.000000',
        'unit_id' => 1,
        'account_id' => 3200,
        'tax_id' => 28,
        'text' => 'Custom position',
        'unit_price' => '50.000000',
        'discount_in_percent' => '0.000000',
    ];

    $mockClient = new MockClient([
        MockResponse::make([
            'id' => 123,
            'title' => 'Article order',
            'positions' => [],
        ], 201),
        MockResponse::make($articlePositionPayload, 201),
        MockResponse::make($customPositionPayload, 201),
        MockResponse::make([
            'id' => 123,
            'title' => 'Article order',
            'positions' => [$articlePositionPayload, $customPositionPayload],
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = (new Order(
        title: 'Article order',
        contact_id: 1,
        positions: new ItemPositionCollection([
            new ItemPositionArticle(
                amount: '1',
                unit_id: 1,
                account_id: 3200,
                tax_id: 28,
                text: 'Article position',
                unit_price: '123.45',
                article_id: 99,
                discount_in_percent: '0',
            ),
            new ItemPositionCustom(
                tax_id: 28,
                amount: '2',
                unit_id: 1,
                account_id: 3200,
                text: 'Custom position',
                unit_price: '50',
                discount_in_percent: '0',
            ),
        ]),
    ))->attachClient($client);

    $created = $order->create();

    expect($created)->toBeInstanceOf(Order::class)
        ->and($created->positions[0])->toBeInstanceOf(ItemPositionArticle::class)
        ->and($created->positions[0]->article_id)->toBe(99);

    $mockClient->assertSentInOrder([
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateOrderRequest
                && $request->resolveEndpoint() === '/2.0/kb_order'
                && $body['positions'] === [];
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_order/123/kb_position_article'
                && $body['article_id'] === 99
                && ! array_key_exists('type', $body);
        },
        function (SaloonRequest $request): bool {
            $body = $request->body()->all();

            return $request instanceof CreateItemPositionRequest
                && $request->resolveEndpoint() === '/2.0/kb_order/123/kb_position_custom'
                && $body['text'] === 'Custom position'
                && ! array_key_exists('type', $body);
        },
        fn (SaloonRequest $request): bool => $request instanceof GetOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123',
    ]);
});

it('keeps custom-only order creation inline', function () {
    $mockClient = new MockClient([
        CreateOrderRequest::class => MockResponse::make([
            'id' => 123,
            'title' => 'Custom order',
        ], 201),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = (new Order(
        title: 'Custom order',
        contact_id: 1,
        positions: new ItemPositionCollection([
            new ItemPositionCustom(
                tax_id: 28,
                amount: '1',
                account_id: 3200,
                text: 'Custom position',
                unit_price: '50',
            ),
        ]),
    ))->attachClient($client);

    $created = $order->create();

    expect($created)->toBeInstanceOf(Order::class)
        ->and($created->id)->toBe(123);

    $mockClient->assertSentCount(1);
    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $body = $request->body()->all();

        return $request instanceof CreateOrderRequest
            && $request->resolveEndpoint() === '/2.0/kb_order'
            && $body['positions'][0]['text'] === 'Custom position';
    });
});

it('deletes the shell order when deferred article position creation fails', function () {
    $mockClient = new MockClient([
        CreateOrderRequest::class => MockResponse::make([
            'id' => 123,
            'title' => 'Article order',
            'positions' => [],
        ], 201),
        CreateItemPositionRequest::class => MockResponse::make([
            'error_code' => 422,
            'errors' => ['Article position rejected'],
        ], 422),
        DeleteOrderRequest::class => MockResponse::make(['success' => true]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = (new Order(
        title: 'Article order',
        contact_id: 1,
        positions: new ItemPositionCollection([
            new ItemPositionArticle(
                amount: '1',
                unit_id: 1,
                account_id: 3200,
                tax_id: 28,
                text: 'Article position',
                unit_price: '123.45',
                article_id: 99,
                discount_in_percent: '0',
            ),
        ]),
    ))->attachClient($client);

    expect(fn () => $order->create())->toThrow(RequestException::class);

    $mockClient->assertSent(fn (SaloonRequest $request): bool => $request instanceof DeleteOrderRequest
        && $request->resolveEndpoint() === '/2.0/kb_order/123');
    $mockClient->assertNotSent(GetOrderRequest::class);
});

it('returns a document pdf dto for an order pdf request', function () {
    $mockClient = new MockClient([
        GetOrderPdfRequest::class => MockResponse::make([
            'name' => 'document-00005.pdf',
            'size' => 9,
            'mime' => 'application/pdf',
            'content' => base64_encode('%PDF-test'),
        ]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    $pdf = Order::useClient($client)->pdf(123, true);

    expect($pdf)->toBeInstanceOf(DocumentPdf::class)
        ->and($pdf->name)->toBe('document-00005.pdf')
        ->and($pdf->decodedContent())->toBe('%PDF-test');

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof GetOrderPdfRequest
            && $request->resolveEndpoint() === '/2.0/kb_order/123/pdf'
            && $request->query()->get('logopaper') === 1;
    });
});

it('manages order repetition through typed dto requests', function () {
    $mockClient = new MockClient([
        UpdateOrderRepetitionRequest::class => MockResponse::make([
            'start' => '2026-05-01',
            'end' => '2026-12-31',
            'repetition' => [
                'type' => 'monthly',
                'interval' => 1,
                'schedule' => 'fixed_day',
            ],
        ]),
        GetOrderRepetitionRequest::class => MockResponse::make([
            'start' => '2026-05-01',
            'end' => '2026-12-31',
            'repetition' => [
                'type' => 'monthly',
                'interval' => 1,
                'schedule' => 'fixed_day',
            ],
        ]),
        DeleteOrderRepetitionRequest::class => MockResponse::make([], 200),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
    $order = Order::useClient($client);
    $repetition = OrderRepetition::monthly(
        start: '2026-05-01',
        end: '2026-12-31',
        interval: 1,
        schedule: OrderRepetitionMonthlySchedule::FIXED_DAY,
    );

    $updated = $order->updateRepetition($repetition, 123);
    $fetched = $order->getRepetition(123);
    $deleted = $order->deleteRepetition(123);

    expect($updated)->toBeInstanceOf(OrderRepetition::class)
        ->and($fetched->repetition->schedule)->toBe(OrderRepetitionMonthlySchedule::FIXED_DAY)
        ->and($deleted)->toBeTrue();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        if (! $request instanceof UpdateOrderRepetitionRequest) {
            return false;
        }

        return $request->resolveEndpoint() === '/2.0/kb_order/123/repetition'
            && $request->body()->all() === [
                'start' => '2026-05-01',
                'end' => '2026-12-31',
                'repetition' => [
                    'type' => 'monthly',
                    'interval' => 1,
                    'schedule' => 'fixed_day',
                ],
            ];
    });
});
