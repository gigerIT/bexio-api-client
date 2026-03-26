<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use PHPUnit\Framework\Assert;

it('can get Calendar Years', function () {
    $years = CalendarYear::useClient(testClient())->all();

    if (count($years) === 0) {
        Assert::markTestSkipped('No calendar years available');
    }

    expect($years)->toBeArray()
        ->and($years[0])->toBeInstanceOf(CalendarYear::class)
        ->and($years[0]->id)->toBeInt();
});

it('can get a Calendar Year', function () {
    $years = CalendarYear::useClient(testClient())->all();
    if (count($years) === 0) {
        Assert::markTestSkipped('No calendar years available');
    }

    $id = $years[0]->uuid ?? (string) $years[0]->id;
    $year = CalendarYear::useClient(testClient())->find($id);

    expect($year)->toBeInstanceOf(CalendarYear::class)
        ->and($year->id)->toBeInt();
});

it('can get first Calendar Year using query builder', function () {
    $year = CalendarYear::useClient(testClient())->query()->first();

    if (! $year) {
        Assert::markTestSkipped('No calendar years available');
    }

    expect($year)->toBeInstanceOf(CalendarYear::class)
        ->and($year->id)->toBeInt();
});
