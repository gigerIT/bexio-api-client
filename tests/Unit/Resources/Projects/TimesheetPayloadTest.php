<?php

use Bexio\Resources\Projects\Timesheets\Requests\CreateTimesheetRequest;
use Bexio\Resources\Projects\Timesheets\Requests\UpdateTimesheetRequest;
use Bexio\Resources\Projects\Timesheets\Timesheet;

it('writes tracking rather than calculated timesheet fields', function () {
    $timesheet = Timesheet::from([
        'id' => 42, 'user_id' => 1, 'allowable_bill' => false, 'client_service_id' => 2,
        'tracking' => ['type' => 'duration', 'date' => '2026-10-02', 'duration' => '01:15'],
        'date' => '2026-10-02', 'duration' => '01:15', 'running' => false,
        'travel_time' => '00:00', 'travel_distance' => 0, 'travel_charge' => '0.00',
    ]);
    foreach ([new CreateTimesheetRequest($timesheet), new UpdateTimesheetRequest($timesheet)] as $request) {
        $body = $request->body()->all();
        expect($body['tracking'])->toBe($timesheet->tracking);
        foreach (['id', 'date', 'duration', 'running', 'travel_time', 'travel_distance', 'travel_charge'] as $field) {
            expect($body)->not->toHaveKey($field);
        }
    }
});
