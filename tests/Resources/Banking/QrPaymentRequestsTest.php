<?php

namespace Bexio\Resources\Banking;

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Banking\LegacyPayments\Requests\DeleteLegacyPaymentRequest;
use Bexio\Resources\Banking\QrPayments\QrPayment;
use Bexio\Resources\Banking\Shared\BankPayment;
use Bexio\Resources\Banking\Shared\BankPaymentAmount;
use Bexio\Resources\Banking\Shared\BankPaymentRecipient;
use DateTimeImmutable;
use Saloon\Exceptions\Request\Statuses\ForbiddenException;

it('covers QR payment create, get and update endpoints', function () {
    $client = testClient();
    $bankAccount = null;

    foreach (BankAccount::useClient($client)->all() as $account) {
        if ($account->id !== null && $account->iban_nr !== null) {
            $bankAccount = $account;
            break;
        }
    }

    if (! $bankAccount instanceof BankAccount) {
        \PHPUnit\Framework\Assert::markTestSkipped('No bank account with IBAN available');
    }

    $createdPayment = null;

    try {
        $createdPayment = (new QrPayment(
            bank_account_id: $bankAccount->id,
            payment: new BankPayment(
                instructed_amount: new BankPaymentAmount(currency: 'CHF', amount: 1.00),
                recipient: new BankPaymentRecipient(
                    name: 'Bexio API Test',
                    street: 'Teststrasse',
                    zip: '8000',
                    city: 'Zurich',
                    country_code: 'CH',
                    house_number: '1',
                ),
                iban: 'CH4431999123000889012',
                execution_date: nextQrPaymentExecutionDate(),
                is_salary_payment: false,
                is_editing_restricted: false,
                qr_reference_nr: '210000000003139471430009017',
                additional_information: 'Bexio API client QR test payment',
            ),
        ))
            ->attachClient($client)
            ->create();

        expect($createdPayment)->toBeInstanceOf(QrPayment::class)
            ->and($createdPayment->id)->toBeInt()
            ->and($createdPayment->uuid)->toBeString()
            ->and($createdPayment->type)->toBe('qr')
            ->and($createdPayment->payment)->toBeInstanceOf(BankPayment::class);

        $fetchedPayment = QrPayment::useClient($client)
            ->forBankAccount($bankAccount->id)
            ->find($createdPayment->id);

        expect($fetchedPayment)->toBeInstanceOf(QrPayment::class)
            ->and($fetchedPayment->id)->toBe($createdPayment->id);

        $createdPayment->payment->additional_information = 'Updated Bexio API client QR test payment';

        try {
            $updatedPayment = $createdPayment->attachClient($client)->update();

            expect($updatedPayment)->toBeInstanceOf(QrPayment::class)
                ->and($updatedPayment->id)->toBe($createdPayment->id)
                ->and($updatedPayment->payment)->toBeInstanceOf(BankPayment::class);
        } catch (ForbiddenException $exception) {
            expect($exception->getMessage())->toContain('You are not allowed to access this resource.');
        }
    } finally {
        if ($createdPayment?->uuid !== null || $createdPayment?->id !== null) {
            $client->send(new DeleteLegacyPaymentRequest($createdPayment->uuid ?? $createdPayment->id));
        }
    }
});

function nextQrPaymentExecutionDate(): string
{
    $date = new DateTimeImmutable('tomorrow');

    while ((int)$date->format('N') >= 6) {
        $date = $date->modify('+1 day');
    }

    return $date->format('Y-m-d');
}
