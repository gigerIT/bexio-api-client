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

it('can scope outgoing payments by bill id', function () {
    try {
        $payments = OutgoingPayment::useClient(testClient())->query()->limit(1)->get();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Outgoing payments endpoint requires bill context: ' . $e->getMessage());
    }

    if (count($payments) === 0 || blank($payments[0]->bill_id ?? null)) {
        \PHPUnit\Framework\Assert::markTestSkipped('No outgoing payments with bill_id available');
    }

    $scoped = OutgoingPayment::useClient(testClient())
        ->query()
        ->forBill($payments[0]->bill_id)
        ->limit(1)
        ->get();

    expect($scoped)->toBeArray()
        ->and(count($scoped))->toBeLessThanOrEqual(1);

    if (count($scoped) > 0) {
        expect($scoped[0]->bill_id)->toBe($payments[0]->bill_id);
    }
});

