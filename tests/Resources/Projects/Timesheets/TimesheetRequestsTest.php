<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use PHPUnit\Framework\Assert;

it('can get Timesheets', function () {
    try {
        $timesheets = Timesheet::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Timesheets endpoint unavailable: '.$e->getMessage());
    }

    if (count($timesheets) === 0) {
        Assert::markTestSkipped('No timesheets available');
    }

    expect($timesheets)->toBeArray()
        ->and($timesheets[0])->toBeInstanceOf(Timesheet::class)
        ->and($timesheets[0]->id)->toBeInt();
});

it('can get a Timesheet', function () {
    try {
        $timesheets = Timesheet::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Timesheets endpoint unavailable: '.$e->getMessage());
    }

    if (count($timesheets) === 0) {
        Assert::markTestSkipped('No timesheets available');
    }

    $timesheet = Timesheet::useClient(testClient())->find($timesheets[0]->id);

    expect($timesheet)->toBeInstanceOf(Timesheet::class)
        ->and($timesheet->id)->toBeInt();
});

it('can get first Timesheet using query builder', function () {
    try {
        $timesheet = Timesheet::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Timesheets endpoint unavailable: '.$e->getMessage());
    }

    if (! $timesheet) {
        Assert::markTestSkipped('No timesheets available');
    }

    expect($timesheet)->toBeInstanceOf(Timesheet::class)
        ->and($timesheet->id)->toBeInt();
});
