<?php

use Bexio\Resources\Purchase\Bills\Requests\GetBillDocumentNumberRequest;
use Bexio\Resources\Purchase\Bills\Requests\UpdateBillBookingRequest;
use Bexio\Resources\Purchase\Expenses\Expense;
use Bexio\Resources\Purchase\Expenses\Requests\CreateExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\DeleteExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\DuplicateExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpenseDocumentNumberRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpensesRequest;
use Bexio\Resources\Purchase\Expenses\Requests\UpdateExpenseBookingRequest;
use Bexio\Resources\Purchase\Expenses\Requests\UpdateExpenseRequest;
use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\CreateOutgoingPaymentRequest;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\UpdateOutgoingPaymentRequest;
use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\CreatePurchaseOrderRequest;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\DeletePurchaseOrderRequest;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\GetPurchaseOrderRequest;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\GetPurchaseOrdersRequest;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\UpdatePurchaseOrderRequest;
use Saloon\Enums\Method;
use Saloon\Http\Request;

function purchaseDefaultBody(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultBody');
    $method->setAccessible(true);

    return $method->invoke($request);
}

function purchaseDefaultQuery(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultQuery');
    $method->setAccessible(true);

    return $method->invoke($request);
}

it('builds bill booking and document number requests', function () {
    $booking = new UpdateBillBookingRequest('bill-uuid', 'BOOKED');

    expect($booking->getMethod())->toBe(Method::PUT)
        ->and($booking->resolveEndpoint())->toBe('/4.0/purchase/bills/bill-uuid/bookings/BOOKED');

    $documentNumber = new GetBillDocumentNumberRequest('LR-100');

    expect($documentNumber->getMethod())->toBe(Method::GET)
        ->and($documentNumber->resolveEndpoint())->toBe('/4.0/purchase/documentnumbers/bills')
        ->and(purchaseDefaultQuery($documentNumber))->toBe(['document_no' => 'LR-100']);
});

it('builds expense CRUD, booking, action, and document number requests', function () {
    $expense = new Expense(
        paid_on: '2024-01-15',
        currency_code: 'CHF',
        amount: 42.5,
        attachment_ids: ['file-uuid'],
        id: 'expense-uuid',
        title: 'Test Expense',
        booking_account_id: 77,
    );

    expect((new GetExpensesRequest(limit: 5, offset: 10))->resolveEndpoint())->toBe('/4.0/expenses')
        ->and(purchaseDefaultQuery(new GetExpensesRequest(limit: 5, offset: 10)))->toBe([
            'limit' => 5,
            'offset' => 10,
        ])
        ->and((new GetExpenseRequest('expense-uuid'))->resolveEndpoint())->toBe('/4.0/expenses/expense-uuid')
        ->and((new DeleteExpenseRequest('expense-uuid'))->getMethod())->toBe(Method::DELETE)
        ->and((new DeleteExpenseRequest('expense-uuid'))->resolveEndpoint())->toBe('/4.0/expenses/expense-uuid');

    $create = new CreateExpenseRequest($expense);
    $update = new UpdateExpenseRequest($expense);

    expect($create->getMethod())->toBe(Method::POST)
        ->and($create->resolveEndpoint())->toBe('/4.0/expenses')
        ->and(purchaseDefaultBody($create))->toMatchArray([
            'paid_on' => '2024-01-15',
            'currency_code' => 'CHF',
            'amount' => 42.5,
            'attachment_ids' => ['file-uuid'],
        ])
        ->and($update->getMethod())->toBe(Method::PUT)
        ->and($update->resolveEndpoint())->toBe('/4.0/expenses/expense-uuid')
        ->and(purchaseDefaultBody($update))->not->toHaveKeys(['status', 'created_at', 'document_no']);

    expect((new UpdateExpenseBookingRequest('expense-uuid', 'DONE'))->getMethod())->toBe(Method::PUT)
        ->and((new UpdateExpenseBookingRequest('expense-uuid', 'DONE'))->resolveEndpoint())->toBe('/4.0/expenses/expense-uuid/bookings/DONE')
        ->and((new DuplicateExpenseRequest('expense-uuid'))->getMethod())->toBe(Method::POST)
        ->and((new DuplicateExpenseRequest('expense-uuid'))->resolveEndpoint())->toBe('/4.0/expenses/expense-uuid/actions')
        ->and(purchaseDefaultBody(new DuplicateExpenseRequest('expense-uuid')))->toBe(['action' => 'DUPLICATE'])
        ->and((new GetExpenseDocumentNumberRequest('EX-100'))->resolveEndpoint())->toBe('/4.0/expenses/documentnumbers')
        ->and(purchaseDefaultQuery(new GetExpenseDocumentNumberRequest('EX-100')))->toBe(['document_no' => 'EX-100']);
});

it('builds purchase order create, read, update, and delete requests', function () {
    $purchaseOrder = new PurchaseOrder(
        contact_id: 14,
        id: 123,
        title: 'Updated purchase order',
    );

    $index = new GetPurchaseOrdersRequest(orderBy: 'updated_at_desc', limit: 5, offset: 10);
    $create = new CreatePurchaseOrderRequest($purchaseOrder);
    $update = new UpdatePurchaseOrderRequest($purchaseOrder);

    expect($index->getMethod())->toBe(Method::GET)
        ->and($index->resolveEndpoint())->toBe('/3.0/purchase_orders')
        ->and(purchaseDefaultQuery($index))->toBe([
            'order_by' => 'updated_at_desc',
            'limit' => 5,
            'offset' => 10,
        ])
        ->and($create->getMethod())->toBe(Method::POST)
        ->and($create->resolveEndpoint())->toBe('/3.0/purchase_orders')
        ->and(purchaseDefaultBody($create))->toMatchArray([
            'contact_id' => 14,
            'title' => 'Updated purchase order',
        ])
        ->and((new GetPurchaseOrderRequest(123))->resolveEndpoint())->toBe('/3.0/purchase_orders/123')
        ->and($update->getMethod())->toBe(Method::PUT)
        ->and($update->resolveEndpoint())->toBe('/3.0/purchase_orders/123')
        ->and(purchaseDefaultBody($update))->toMatchArray([
            'id' => 123,
            'contact_id' => 14,
            'title' => 'Updated purchase order',
        ])
        ->and((new DeletePurchaseOrderRequest(123))->getMethod())->toBe(Method::DELETE)
        ->and((new DeletePurchaseOrderRequest(123))->resolveEndpoint())->toBe('/3.0/purchase_orders/123');
});

it('builds outgoing payment create and update requests', function () {
    $payment = new OutgoingPayment(
        id: 'payment-uuid',
        bill_id: 'bill-uuid',
        payment_type: 'MANUAL',
        execution_date: '2026-04-27',
        amount: 25.50,
        currency_code: 'CHF',
        exchange_rate: 1.0,
        sender_bank_account_id: 1,
        is_salary_payment: false,
    );

    $create = new CreateOutgoingPaymentRequest($payment);
    $update = new UpdateOutgoingPaymentRequest($payment);

    expect($create->getMethod())->toBe(Method::POST)
        ->and($create->resolveEndpoint())->toBe('/4.0/purchase/outgoing-payments')
        ->and(purchaseDefaultBody($create))->toMatchArray([
            'bill_id' => 'bill-uuid',
            'payment_type' => 'MANUAL',
            'execution_date' => '2026-04-27',
            'amount' => 25.50,
        ])
        ->and($update->getMethod())->toBe(Method::PUT)
        ->and($update->resolveEndpoint())->toBe('/4.0/purchase/outgoing-payments')
        ->and(purchaseDefaultBody($update))->toBe([
            'payment_id' => 'payment-uuid',
            'execution_date' => '2026-04-27',
            'amount' => 25.50,
            'is_salary_payment' => false,
        ]);
});
