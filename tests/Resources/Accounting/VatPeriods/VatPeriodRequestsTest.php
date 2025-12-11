<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\VatPeriods\VatPeriod;

it('can get Vat Periods', function () {
    $periods = VatPeriod::useClient(testClient())->all();

    if (count($periods) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No VAT periods available');
    }

    expect($periods)->toBeArray()
        ->and($periods[0])->toBeInstanceOf(VatPeriod::class)
        ->and($periods[0]->id)->toBeInt();
});

it('can get a Vat Period', function () {
    $periods = VatPeriod::useClient(testClient())->all();
    if (count($periods) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No VAT periods available');
    }

    $period = VatPeriod::useClient(testClient())->find($periods[0]->uuid ?? $periods[0]->id);

    expect($period)->toBeInstanceOf(VatPeriod::class)
        ->and($period->id)->toBeInt();
});

it('can get first Vat Period using query builder', function () {
    $period = VatPeriod::useClient(testClient())->query()->first();

    if (!$period) {
        \PHPUnit\Framework\Assert::markTestSkipped('No VAT periods available');
    }

    expect($period)->toBeInstanceOf(VatPeriod::class)
        ->and($period->id)->toBeInt();
});

