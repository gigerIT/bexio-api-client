<?php

use Bexio\Resources\Banking\Payments\Payment;
use Bexio\Resources\Banking\Payments\Requests\CreatePaymentRequest;
use Bexio\Resources\Banking\Payments\Requests\UpdatePaymentRequest;
use Saloon\Http\Request;

function paymentDefaultBody(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultBody');
    $method->setAccessible(true);

    return $method->invoke($request);
}

function paymentWithAllPayloadFields(): Payment
{
    return Payment::from([
        'id' => 123,
        'uuid' => 'payment-uuid',
        'sender' => [
            'id' => 1,
            'uuid' => 'account-uuid',
            'iban' => 'CH5604835012345678009',
        ],
        'recipient' => [
            'name' => 'Example Recipient',
            'iban' => 'CH9300762011623852957',
            'address' => [
                'street_name' => 'Main Street',
                'house_number' => '42',
                'zip' => '8000',
                'city' => 'Zurich',
                'country_code' => 'CH',
            ],
        ],
        'amount' => '125.50',
        'currency' => 'CHF',
        'execution_date' => '2026-07-23',
        'allowance' => 'fee_split',
        'is_salary' => false,
        'instruction_id' => 'instruction-id',
        'purchase_reference' => [
            'bill_id' => 'bill-id',
            'bill_payment_id' => 'payment-id',
        ],
        'document_no' => 'DOC-123',
        'qr_reference_number' => '210000000003139471430009017',
        'additional_information' => 'Payment information',
        'status' => 'draft',
        'type' => 'iban',
        'due_date' => '2026-07-24',
        'created_at' => '2026-07-22T10:00:00+00:00',
        'is_editing_restricted' => true,
        'message' => 'Payment message',
        'account_id' => 'account-uuid',
    ]);
}

it('serializes only documented payment update fields', function () {
    $payment = paymentWithAllPayloadFields();

    $body = paymentDefaultBody(new UpdatePaymentRequest($payment));

    expect(array_keys($body))->toEqualCanonicalizing([
        'type',
        'allowance',
        'amount',
        'currency',
        'execution_date',
        'is_salary',
        'recipient',
        'is_editing_restricted',
        'message',
        'additional_information',
        'qr_reference_number',
    ])
        ->and($body['amount'])->toBe(125.50)
        ->and($body['recipient'])->toBe([
            'name' => 'Example Recipient',
            'iban' => 'CH9300762011623852957',
            'address' => [
                'street_name' => 'Main Street',
                'house_number' => '42',
                'zip' => '8000',
                'city' => 'Zurich',
                'country_code' => 'CH',
            ],
        ])
        ->and($body)->not->toHaveKeys([
            'id',
            'uuid',
            'sender',
            'instruction_id',
            'purchase_reference',
            'document_no',
            'status',
            'created_at',
            'due_date',
            'account_id',
        ]);
});

it('keeps account and type fields in payment create payloads', function () {
    $payment = paymentWithAllPayloadFields();
    $createBody = paymentDefaultBody(new CreatePaymentRequest($payment));

    expect($createBody)
        ->toHaveKey('amount', 125.50)
        ->toHaveKey('account_id', 'account-uuid')
        ->toHaveKey('type', 'iban')
        ->toHaveKey('purchase_reference', ['bill_id' => 'bill-id', 'bill_payment_id' => 'payment-id']);
});

it('uses the banking UUID for instance refresh and deletion', function () {
    $mock = new \Saloon\Http\Faking\MockClient([
        \Bexio\Resources\Banking\Payments\Requests\GetPaymentRequest::class => \Saloon\Http\Faking\MockResponse::make(['id' => 42, 'uuid' => 'payment-uuid']),
        \Bexio\Resources\Banking\Payments\Requests\DeletePaymentRequest::class => \Saloon\Http\Faking\MockResponse::make(['success' => true]),
    ]);
    $client = (new \Bexio\BexioClient('mock-token'))->withMockClient($mock);
    $payment = (new Payment(id: 42, uuid: 'payment-uuid'))->attachClient($client);
    expect($payment->refresh()->uuid)->toBe('payment-uuid')->and($payment->delete())->toBeTrue();
    $mock->assertSentCount(2);
    $mock->assertSent(fn ($request): bool => $request->resolveEndpoint() === '/4.0/banking/payments/payment-uuid');
});

it('omits unset optional payment fields and IBAN allowances from QR updates', function () {
    $newPayment = new Payment(type: 'iban');
    expect(paymentDefaultBody(new CreatePaymentRequest($newPayment)))->not->toHaveKeys([
        'purchase_reference', 'qr_reference_number', 'additional_information', 'is_editing_restricted', 'allowance',
    ]);
    $qr = paymentWithAllPayloadFields();
    $qr->type = 'qr';
    expect(paymentDefaultBody(new UpdatePaymentRequest($qr)))
        ->toHaveKey('type', 'qr')
        ->toHaveKey('qr_reference_number', '210000000003139471430009017')
        ->toHaveKey('additional_information', 'Payment information')
        ->not->toHaveKey('allowance');
});
