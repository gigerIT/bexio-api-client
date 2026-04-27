<?php

namespace Bexio\Resources\Banking;

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Banking\IbanPayments\IbanPayment;
use Bexio\Resources\Banking\LegacyPayments\Requests\DeleteLegacyPaymentRequest;
use Bexio\Resources\Banking\Shared\BankPayment;
use Bexio\Resources\Banking\Shared\BankPaymentAmount;
use Bexio\Resources\Banking\Shared\BankPaymentRecipient;
use DateTimeImmutable;
use Saloon\Exceptions\Request\Statuses\ForbiddenException;

it('covers IBAN payment create, get and update endpoints', function () {
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
        $createdPayment = (new IbanPayment(
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
                iban: 'CH8100700110005554634',
                execution_date: nextIbanPaymentExecutionDate(),
                is_salary_payment: false,
                is_editing_restricted: false,
                message: 'Bexio API client test payment',
            ),
        ))
            ->attachClient($client)
            ->create();

        expect($createdPayment)->toBeInstanceOf(IbanPayment::class)
            ->and($createdPayment->id)->toBeInt()
            ->and($createdPayment->uuid)->toBeString()
            ->and($createdPayment->type)->toBe('iban')
            ->and($createdPayment->payment)->toBeInstanceOf(BankPayment::class)
            ->and($createdPayment->payment->message)->toBe('Bexio API client test payment');

        $fetchedPayment = IbanPayment::useClient($client)
            ->forBankAccount($bankAccount->id)
            ->find($createdPayment->id);

        expect($fetchedPayment)->toBeInstanceOf(IbanPayment::class)
            ->and($fetchedPayment->id)->toBe($createdPayment->id);

        $createdPayment->payment->message = 'Updated Bexio API client test payment';

        try {
            $updatedPayment = $createdPayment->attachClient($client)->update();

            expect($updatedPayment)->toBeInstanceOf(IbanPayment::class)
                ->and($updatedPayment->id)->toBe($createdPayment->id)
                ->and($updatedPayment->payment)->toBeInstanceOf(BankPayment::class)
                ->and($updatedPayment->payment->message)->toBe('Updated Bexio API client test payment');
        } catch (ForbiddenException $exception) {
            expect($exception->getMessage())->toContain('You are not allowed to access this resource.');
        }
    } finally {
        if ($createdPayment?->uuid !== null || $createdPayment?->id !== null) {
            $client->send(new DeleteLegacyPaymentRequest($createdPayment->uuid ?? $createdPayment->id));
        }
    }
});

function nextIbanPaymentExecutionDate(): string
{
    $date = new DateTimeImmutable('tomorrow');

    while ((int)$date->format('N') >= 6) {
        $date = $date->modify('+1 day');
    }

    return $date->format('Y-m-d');
}
