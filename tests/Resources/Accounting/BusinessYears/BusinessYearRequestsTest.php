<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\BusinessYears\BusinessYear;

it('can get Business Years', function () {
    $years = BusinessYear::useClient(testClient())->all();

    if (count($years) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business years available');
    }

    expect($years)->toBeArray()
        ->and($years[0])->toBeInstanceOf(BusinessYear::class)
        ->and($years[0]->id)->toBeInt()
        ->and($years[0]->date_start)->toBeString()->not->toBe('')
        ->and($years[0]->date_end)->toBeString()->not->toBe('')
        ->and($years[0]->status)->toBeString()->not->toBe('');
});

it('can get a Business Year', function () {
    $years = BusinessYear::useClient(testClient())->all();
    if (count($years) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business years available');
    }

    $id = $years[0]->uuid ?? (string)$years[0]->id;
    $year = BusinessYear::useClient(testClient())->find($id);

    expect($year)->toBeInstanceOf(BusinessYear::class)
        ->and($year->id)->toBeInt()
        ->and($year->date_start)->toBeString()->not->toBe('')
        ->and($year->date_end)->toBeString()->not->toBe('')
        ->and($year->status)->toBeString()->not->toBe('');
});

it('can get first Business Year using query builder', function () {
    $year = BusinessYear::useClient(testClient())->query()->first();

    if (!$year) {
        \PHPUnit\Framework\Assert::markTestSkipped('No business years available');
    }

    expect($year)->toBeInstanceOf(BusinessYear::class)
        ->and($year->id)->toBeInt()
        ->and($year->date_start)->toBeString()->not->toBe('')
        ->and($year->date_end)->toBeString()->not->toBe('')
        ->and($year->status)->toBeString()->not->toBe('');
});

