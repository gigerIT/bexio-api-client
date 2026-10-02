<?php

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Bexio\Resources\Projects\Projects\Project;
use Bexio\Resources\Projects\Timesheets\Timesheet;
use Bexio\Support\Data\SearchCriteria;

it('creates updates searches and deletes a timesheet with duration tracking', function () {
    withTestProject(function (Project $project): void {
        $activity = BusinessActivity::useClient(testClient())->query()->first();
        if ($activity === null) {
            test()->markTestSkipped('No business activity configured');
        }
        $timesheet = (new Timesheet(
            user_id: $project->user_id, allowable_bill: false, client_service_id: $activity->id,
            pr_project_id: $project->id, text: 'API sync duration',
            tracking: ['type' => 'duration', 'date' => date('Y-m-d'), 'duration' => '01:15'],
        ))->attachClient(testClient())->create();
        try {
            expect($timesheet->id)->toBeInt()
                ->and($timesheet->refresh()->duration)->toBe('1:15');
            $timesheet->tracking = ['type' => 'duration', 'date' => date('Y-m-d'), 'duration' => '00:30'];
            $timesheet = $timesheet->update();
            expect($timesheet->duration)->toBe('0:30');
            $matches = Timesheet::useClient(testClient())->query()->where('id', SearchCriteria::EQUAL, $timesheet->id)->get();
            expect($matches)->toHaveCount(1)->and($matches[0]->id)->toBe($timesheet->id);
        } finally {
            $timesheet->delete();
        }
    });
});
