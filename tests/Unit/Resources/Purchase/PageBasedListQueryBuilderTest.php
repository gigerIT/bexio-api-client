<?php

use Bexio\BexioClient;
use Bexio\Resources\Banking\Payments\Payment;
use Bexio\Resources\Banking\Payments\Requests\GetPaymentsRequest;
use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\Requests\GetBillsRequest;
use Bexio\Resources\Purchase\Expenses\Expense;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpensesRequest;
use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\GetOutgoingPaymentsRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('maps bill forPage and orderBy to page-based query keys', function () {
    $mockClient = new MockClient([
        GetBillsRequest::class => MockResponse::make(['data' => []]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Bill::useClient($client)
        ->query()
        ->forPage(2, 15)
        ->orderBy('document_no', 'desc')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof GetBillsRequest
            && ($query['limit'] ?? null) === 15
            && ($query['page'] ?? null) === 2
            && ($query['sort'] ?? null) === 'document_no'
            && ($query['order'] ?? null) === 'desc'
            && ! array_key_exists('offset', $query)
            && ! array_key_exists('order_by', $query);
    });
});

it('rejects offset on bill queries', function () {
    expect(fn () => Bill::useClient(new BexioClient('mock-token'))->query()->offset(10))
        ->toThrow(InvalidArgumentException::class);
});

it('maps expense forPage and orderBy to page-based query keys', function () {
    $mockClient = new MockClient([
        GetExpensesRequest::class => MockResponse::make(['data' => []]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Expense::useClient($client)
        ->query()
        ->forPage(2, 15)
        ->orderBy('document_no', 'desc')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof GetExpensesRequest
            && ($query['limit'] ?? null) === 15
            && ($query['page'] ?? null) === 2
            && ($query['sort'] ?? null) === 'document_no'
            && ($query['order'] ?? null) === 'desc'
            && ! array_key_exists('offset', $query)
            && ! array_key_exists('order_by', $query);
    });
});

it('rejects offset on expense queries', function () {
    expect(fn () => Expense::useClient(new BexioClient('mock-token'))->query()->offset(10))
        ->toThrow(InvalidArgumentException::class);
});

it('maps outgoing payment pagination and forBill to query keys', function () {
    $mockClient = new MockClient([
        GetOutgoingPaymentsRequest::class => MockResponse::make(['data' => []]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    OutgoingPayment::useClient($client)
        ->query()
        ->forBill('bill-uuid')
        ->forPage(2, 15)
        ->orderBy('payment_type', 'desc')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof GetOutgoingPaymentsRequest
            && ($query['bill_id'] ?? null) === 'bill-uuid'
            && ($query['limit'] ?? null) === 15
            && ($query['page'] ?? null) === 2
            && ($query['sort'] ?? null) === 'payment_type'
            && ($query['order'] ?? null) === 'desc'
            && ! array_key_exists('offset', $query)
            && ! array_key_exists('order_by', $query);
    });
});

it('rejects offset on outgoing payment queries', function () {
    expect(fn () => OutgoingPayment::useClient(new BexioClient('mock-token'))->query()->offset(10))
        ->toThrow(InvalidArgumentException::class);
});

it('remaps payment limit to per-page and blocks offset and orderBy', function () {
    $mockClient = new MockClient([
        GetPaymentsRequest::class => MockResponse::make(['results' => []]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Payment::useClient($client)->query()->limit(10)->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        $query = $request->query()->all();

        return $request instanceof GetPaymentsRequest
            && ($query['per-page'] ?? null) === 10
            && ! array_key_exists('limit', $query)
            && ! array_key_exists('offset', $query)
            && ! array_key_exists('order_by', $query);
    });

    expect(fn () => Payment::useClient(new BexioClient('mock-token'))->query()->offset(1))
        ->toThrow(InvalidArgumentException::class);

    expect(fn () => Payment::useClient(new BexioClient('mock-token'))->query()->orderBy('amount'))
        ->toThrow(InvalidArgumentException::class);
});
