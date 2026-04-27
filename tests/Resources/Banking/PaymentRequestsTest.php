<?php

namespace Bexio\Resources\Banking;

use Bexio\Resources\Banking\Payments\Payment;
use Saloon\Exceptions\Request\Statuses\NotFoundException;

it('can get Payments', function () {
    try {
        $payments = Payment::useClient(testClient())->query()->perPage(1)->get();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Payments endpoint unavailable: ' . $e->getMessage());
    }

    if (empty($payments)) {
        \PHPUnit\Framework\Assert::markTestSkipped('No payments available');
    }

    expect($payments)->toBeArray()
        ->and($payments[0])->toBeInstanceOf(Payment::class)
        ->and($payments[0]->uuid ?? $payments[0]->id)->not->toBeNull();
});

it('can get a Payment', function () {
    try {
        $payments = Payment::useClient(testClient())->query()->perPage(20)->get();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Payments endpoint unavailable: ' . $e->getMessage());
    }

    if (empty($payments)) {
        \PHPUnit\Framework\Assert::markTestSkipped('No payments available');
    }

    $payment = null;

    foreach ($payments as $candidate) {
        $identifier = $candidate->uuid ?? (string)$candidate->id;

        try {
            $payment = Payment::useClient(testClient())->find($identifier);

            break;
        } catch (NotFoundException) {
            continue;
        }
    }

    if (! $payment) {
        \PHPUnit\Framework\Assert::markTestSkipped('No retrievable payments available');
    }

    expect($payment)->toBeInstanceOf(Payment::class)
        ->and($payment->uuid ?? $payment->id)->not->toBeNull();
});



