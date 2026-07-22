<?php

use Bexio\Resources\Banking\Payments\Payment;
use Bexio\Resources\Banking\Payments\PaymentAccount;
use Bexio\Resources\Banking\Payments\PaymentRecipient;
use Bexio\Resources\Banking\Payments\PaymentRecipientAddress;
use Bexio\Resources\Banking\Payments\PurchasePaymentReference;
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
    $recipient = new PaymentRecipient(
        name: 'Example Recipient',
        iban: 'CH9300762011623852957',
        address: new PaymentRecipientAddress(
            street_name: 'Main Street',
            house_number: '42',
            zip: '8000',
            city: 'Zurich',
            country_code: 'CH',
        ),
    );

    return new Payment(
        id: 123,
        uuid: 'payment-uuid',
        sender: new PaymentAccount(id: 1, uuid: 'account-uuid', iban: 'CH5604835012345678009'),
        recipient: $recipient,
        amount: '125.50',
        currency: 'CHF',
        execution_date: '2026-07-23',
        allowance: 'fee_split',
        is_salary: false,
        instruction_id: 'instruction-id',
        purchase_reference: new PurchasePaymentReference(bill_id: 'bill-id', bill_payment_id: 'payment-id'),
        document_no: 'DOC-123',
        qr_reference_number: '210000000003139471430009017',
        additional_information: 'Create-only information',
        status: 'draft',
        type: 'iban',
        due_date: '2026-07-24',
        created_at: '2026-07-22T10:00:00+00:00',
        is_editing_restricted: true,
        message: 'Payment message',
        account_id: 'account-uuid',
    );
}

it('serializes only documented payment update fields', function () {
    $payment = paymentWithAllPayloadFields();

    $body = paymentDefaultBody(new UpdatePaymentRequest($payment));

    expect(array_keys($body))->toEqualCanonicalizing([
        'allowance',
        'amount',
        'currency',
        'execution_date',
        'is_salary',
        'recipient',
        'is_editing_restricted',
        'message',
    ])
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
            'type',
            'qr_reference_number',
            'additional_information',
        ]);
});

it('keeps account and type fields in payment create payloads', function () {
    $payment = paymentWithAllPayloadFields();
    $createBody = paymentDefaultBody(new CreatePaymentRequest($payment));

    expect($createBody)
        ->toHaveKey('account_id', 'account-uuid')
        ->toHaveKey('type', 'iban');
});
