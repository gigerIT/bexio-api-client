<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionMonthlySchedule;
use Bexio\Resources\Sales\Orders\Enums\OrderRepetitionWeekday;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\OrderRepetition;
use Bexio\Resources\Sales\Orders\Requests\DeleteOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderPdfRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\UpdateOrderRepetitionRequest;
use Bexio\Resources\Sales\Orders\Requests\UpdateOrderRequest;
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
