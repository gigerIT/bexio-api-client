<?php

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Banking\Payments\Payment;
use Bexio\Resources\Banking\Payments\PaymentRecipient;

it('creates updates and deletes an unsubmitted v4 banking payment', function (string $type, string $iban, ?string $reference) {
    $client = testClient();
    $bank = BankAccount::useClient($client)->query()->first();
    if ($bank?->uuid === null) {
        test()->markTestSkipped('No bank account UUID available');
    }
    $payment = (new Payment(
        recipient: PaymentRecipient::from([
            'name' => 'API sync test', 'iban' => $iban,
            'address' => ['street_name' => 'Teststrasse', 'house_number' => '1', 'zip' => '8000', 'city' => 'Zurich', 'country_code' => 'CH'],
        ]),
        amount: 1.25, currency: 'CHF', execution_date: date('Y-m-d', strtotime('+7 days')),
        allowance: $type === 'iban' ? 'fee_split' : null, is_salary: false, type: $type, account_id: $bank->uuid,
        additional_information: 'API sync disposable payment',
        qr_reference_number: $reference,
        message: 'API sync test', is_editing_restricted: false,
    ))->attachClient($client)->create();
    try {
        expect($payment->refresh()->uuid)->toBe($payment->uuid);
        $payment->additional_information = 'API sync updated';
        $payment->amount = 1.50;
        $updated = $payment->update();
        expect($updated->uuid)->toBe($payment->uuid)
            ->and((float) $updated->amount)->toBe(1.50);
        if ($type === 'qr') {
            expect($updated->additional_information)->toBe('API sync updated')
                ->and($updated->qr_reference_number)->toBe($reference);
        }
    } finally {
        $payment->delete();
    }
})->with([
    'IBAN' => ['iban', 'CH8100700110005554634', null],
    'QR' => ['qr', 'CH8100700110005554634', 'RF7812345'],
]);
