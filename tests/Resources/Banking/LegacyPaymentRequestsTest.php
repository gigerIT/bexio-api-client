<?php

use Bexio\BexioClient;
use Bexio\Resources\Banking\LegacyPayments\LegacyPayment;
use Bexio\Resources\Banking\LegacyPayments\Requests\CancelLegacyPaymentRequest;
use Bexio\Resources\Banking\LegacyPayments\Requests\DeleteLegacyPaymentRequest;
use Bexio\Resources\Banking\LegacyPayments\Requests\GetLegacyPaymentsRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

function bankingDefaultQuery(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultQuery');
    $method->setAccessible(true);

    return $method->invoke($request);
}

it('builds legacy v3 payment requests separately from the v4 payment API', function () {
    $index = new GetLegacyPaymentsRequest(
        from: '2024-01-01',
        to: '2024-12-31',
        billId: 'bill-uuid',
        limit: 5,
        offset: 10,
    );

    expect($index->getMethod())->toBe(Method::GET)
        ->and($index->resolveEndpoint())->toBe('/3.0/banking/payments')
        ->and(bankingDefaultQuery($index))->toBe([
            'from' => '2024-01-01',
            'to' => '2024-12-31',
            'bill_id' => 'bill-uuid',
            'limit' => 5,
            'offset' => 10,
        ])
        ->and((new CancelLegacyPaymentRequest('payment-uuid'))->getMethod())->toBe(Method::POST)
        ->and((new CancelLegacyPaymentRequest('payment-uuid'))->resolveEndpoint())->toBe('/3.0/banking/payments/payment-uuid/cancel')
        ->and((new DeleteLegacyPaymentRequest('payment-uuid'))->getMethod())->toBe(Method::DELETE)
        ->and((new DeleteLegacyPaymentRequest('payment-uuid'))->resolveEndpoint())->toBe('/3.0/banking/payments/payment-uuid')
        ->and((new DeleteLegacyPaymentRequest(1))->resolveEndpoint())->toBe('/3.0/banking/payments/1');
});

it('maps legacy v3 payment payloads to a separate DTO', function () {
    $payment = LegacyPayment::from([
        'id' => 1,
        'uuid' => 'payment-uuid',
        'type' => 'iban',
        'bank_account' => [
            'id' => 4,
            'iban' => 'CH560025025010367101Y',
        ],
        'payment' => [
            'execution_date' => '2024-01-15',
            'message' => 'Payment for invoice',
        ],
        'instruction_id' => 'instruction-1',
        'status' => 'open',
        'created_at' => '2024-01-10T12:00:00+00:00',
    ]);

    expect($payment)->toBeInstanceOf(LegacyPayment::class)
        ->and($payment->uuid)->toBe('payment-uuid')
        ->and($payment->payment['execution_date'])->toBe('2024-01-15');
});

it('deletes legacy payments with numeric ids from hydrated DTOs', function () {
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        DeleteLegacyPaymentRequest::class => MockResponse::make([], 204),
    ]));

    $payment = (new LegacyPayment(id: 1))->attachClient($client);

    expect($payment->delete())->toBeTrue();
});
