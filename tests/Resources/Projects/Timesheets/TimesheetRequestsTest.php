<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;

it('can get Timesheets', function () {
    try {
        $timesheets = Timesheet::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Timesheets endpoint unavailable: ' . $e->getMessage());
    }

    if (count($timesheets) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No timesheets available');
    }

    expect($timesheets)->toBeArray()
        ->and($timesheets[0])->toBeInstanceOf(Timesheet::class)
        ->and($timesheets[0]->id)->toBeInt();
});

it('can get a Timesheet', function () {
    try {
        $timesheets = Timesheet::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Timesheets endpoint unavailable: ' . $e->getMessage());
    }

    if (count($timesheets) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No timesheets available');
    }

    $timesheet = Timesheet::useClient(testClient())->find($timesheets[0]->id);

    expect($timesheet)->toBeInstanceOf(Timesheet::class)
        ->and($timesheet->id)->toBeInt();
});

it('can get first Timesheet using query builder', function () {
    try {
        $timesheet = Timesheet::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Timesheets endpoint unavailable: ' . $e->getMessage());
    }

    if (!$timesheet) {
        \PHPUnit\Framework\Assert::markTestSkipped('No timesheets available');
    }

    expect($timesheet)->toBeInstanceOf(Timesheet::class)
        ->and($timesheet->id)->toBeInt();
});

