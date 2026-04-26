<?php

use Bexio\BexioClient;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\Requests\SearchInvoicesRequest;
use Bexio\Resources\Sales\Orders\Enums\OrderStatus;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Orders\Requests\SearchOrdersRequest;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Resources\Sales\Quotes\Requests\SearchQuotesRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('builds invoice search clauses for status and validity dates', function () {
    $mockClient = new MockClient([
        SearchInvoicesRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Invoice::useClient($client)
        ->query()
        ->status(InvoiceStatus::DRAFT)
        ->validBetween(
            new DateTimeImmutable('2026-05-01 12:34:56'),
            new DateTimeImmutable('2026-05-31 23:59:59'),
        )
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof SearchInvoicesRequest
            && $request->body()->all() === [
                [
                    'field' => 'kb_item_status_id',
                    'criteria' => '=',
                    'value' => InvoiceStatus::DRAFT->value,
                ],
                [
                    'field' => 'is_valid_from',
                    'criteria' => '>=',
                    'value' => '2026-05-01',
                ],
                [
                    'field' => 'is_valid_to',
                    'criteria' => '<=',
                    'value' => '2026-05-31',
                ],
            ];
    });
});

it('builds order search clauses for mixed status arrays and validity dates', function () {
    $mockClient = new MockClient([
        SearchOrdersRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Order::useClient($client)
        ->query()
        ->statusIn([OrderStatus::PENDING, OrderStatus::DONE->value])
        ->validFrom('2026-06-01')
        ->validTo('2026-06-30')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof SearchOrdersRequest
            && $request->body()->all() === [
                [
                    'field' => 'kb_item_status_id',
                    'criteria' => 'in',
                    'value' => [
                        OrderStatus::PENDING->value,
                        OrderStatus::DONE->value,
                    ],
                ],
                [
                    'field' => 'is_valid_from',
                    'criteria' => '>=',
                    'value' => '2026-06-01',
                ],
                [
                    'field' => 'is_valid_to',
                    'criteria' => '<=',
                    'value' => '2026-06-30',
                ],
            ];
    });
});

it('builds quote search clauses with the quote validity end field', function () {
    $mockClient = new MockClient([
        SearchQuotesRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Quote::useClient($client)
        ->query()
        ->statusIn([QuoteStatus::DRAFT, QuoteStatus::CONFIRMED->value])
        ->validBetween('2026-07-01', '2026-07-31')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof SearchQuotesRequest
            && $request->body()->all() === [
                [
                    'field' => 'kb_item_status_id',
                    'criteria' => 'in',
                    'value' => [
                        QuoteStatus::DRAFT->value,
                        QuoteStatus::CONFIRMED->value,
                    ],
                ],
                [
                    'field' => 'is_valid_from',
                    'criteria' => '>=',
                    'value' => '2026-07-01',
                ],
                [
                    'field' => 'is_valid_until',
                    'criteria' => '<=',
                    'value' => '2026-07-31',
                ],
            ];
    });
});
