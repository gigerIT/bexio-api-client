<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearsRequest;
use Bexio\Support\Data\SearchCriteria;

it('can get Calendar Years', function () {
    $years = CalendarYear::useClient(testClient())->all();

    if (count($years) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No calendar years available');
    }

    expect($years)->toBeArray()
        ->and($years[0])->toBeInstanceOf(CalendarYear::class)
        ->and($years[0]->id)->toBeInt()
        ->and($years[0]->date_start)->toBeString()->not->toBe('')
        ->and($years[0]->date_end)->toBeString()->not->toBe('');
});

it('can get a Calendar Year', function () {
    $years = CalendarYear::useClient(testClient())->all();
    if (count($years) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No calendar years available');
    }

    $id = $years[0]->uuid ?? (string)$years[0]->id;
    $year = CalendarYear::useClient(testClient())->find($id);

    expect($year)->toBeInstanceOf(CalendarYear::class)
        ->and($year->id)->toBeInt()
        ->and($year->date_start)->toBeString()->not->toBe('')
        ->and($year->date_end)->toBeString()->not->toBe('');
});

it('can search Calendar Years', function () {
    $years = CalendarYear::useClient(testClient())->all();

    if (count($years) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No calendar years available');
    }

    $payload = testClient()->send(new GetCalendarYearsRequest())->json();
    $start = $payload[0]['start'] ?? null;

    if (! $start) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable calendar year available');
    }

    $results = CalendarYear::useClient(testClient())
        ->query()
        ->where('start', SearchCriteria::EQUAL, $start)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(CalendarYear::class)
        ->and($results[0]->date_start)->toBeString()->not->toBe('')
        ->and($results[0]->date_end)->toBeString()->not->toBe('');
});

it('can get first Calendar Year using query builder', function () {
    $year = CalendarYear::useClient(testClient())->query()->first();

    if (!$year) {
        \PHPUnit\Framework\Assert::markTestSkipped('No calendar years available');
    }

    expect($year)->toBeInstanceOf(CalendarYear::class)
        ->and($year->id)->toBeInt()
        ->and($year->date_start)->toBeString()->not->toBe('')
        ->and($year->date_end)->toBeString()->not->toBe('');
});

