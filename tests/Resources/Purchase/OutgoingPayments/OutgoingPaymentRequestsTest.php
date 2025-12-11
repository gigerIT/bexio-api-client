<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;

it('can get Outgoing Payments', function () {
    try {
        $payments = OutgoingPayment::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Outgoing payments endpoint requires bill context: ' . $e->getMessage());
    }

    if (count($payments) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No outgoing payments available');
    }

    expect($payments)->toBeArray()
        ->and($payments[0])->toBeInstanceOf(OutgoingPayment::class)
        ->and($payments[0]->id)->toBeString();
});

it('can get an Outgoing Payment', function () {
    try {
        $payments = OutgoingPayment::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Outgoing payments endpoint requires bill context: ' . $e->getMessage());
    }
    if (count($payments) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No outgoing payments available');
    }

    $payment = OutgoingPayment::useClient(testClient())->find($payments[0]->id);

    expect($payment)->toBeInstanceOf(OutgoingPayment::class)
        ->and($payment->id)->toBeString()
        ->and($payment->payment_type)->toBeString();
});

it('can get first Outgoing Payment using query builder', function () {
    try {
        $payment = OutgoingPayment::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Outgoing payments endpoint requires bill context: ' . $e->getMessage());
    }

    if (!$payment) {
        \PHPUnit\Framework\Assert::markTestSkipped('No outgoing payments available');
    }

    expect($payment)->toBeInstanceOf(OutgoingPayment::class)
        ->and($payment->id)->toBeString();
});

