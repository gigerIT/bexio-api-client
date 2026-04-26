<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Bexio\Resources\Projects\TimesheetStatuses\Requests\GetTimesheetStatusesRequest;
use Bexio\Resources\Projects\TimesheetStatuses\TimesheetStatus;

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

it('builds timesheet status requests', function () {
    expect((new GetTimesheetStatusesRequest(20, 5, 'name'))->resolveEndpoint())
        ->toBe('/2.0/timesheet_status');

    $query = new \ReflectionMethod(GetTimesheetStatusesRequest::class, 'defaultQuery');
    $query->setAccessible(true);

    expect($query->invoke(new GetTimesheetStatusesRequest(20, 5, 'name')))
        ->toBe([
            'order_by' => 'name',
            'limit' => 20,
            'offset' => 5,
        ]);
});

it('can get Timesheet statuses', function () {
    try {
        $statuses = Timesheet::statuses(testClient());
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Timesheet statuses endpoint unavailable: ' . $e->getMessage());
    }

    if (count($statuses) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No timesheet statuses available');
    }

    expect($statuses)->toBeArray()
        ->and($statuses[0])->toBeInstanceOf(TimesheetStatus::class)
        ->and($statuses[0]->id)->toBeInt();
});


