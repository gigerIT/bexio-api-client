<?php

use Bexio\Resources\Other\Notes\Note;
use Bexio\Resources\Other\Tasks\Task;
use Bexio\Resources\Other\Users\User;
use Bexio\Resources\Projects\Projects\Project;
use Bexio\Support\Data\SearchCriteria;

it('preserves project links when reading and updating disposable notes and tasks', function () {
    $client = testClient();
    $user = User::useClient($client)->me();
    $taskStatuses = Task::statuses($client);

    if ($taskStatuses === []) {
        \PHPUnit\Framework\Assert::markTestSkipped('No compatible project/task configuration available');
    }

    withTestProject(function (Project $project) use ($client, $user, $taskStatuses): void {
        $name = $project->name;
        $project->name .= ' updated';
        expect($project->update()->name)->toBe($project->name);

        $note = (new Note(
            user_id: $user->id,
            event_start: now()->format('Y-m-d H:i:s'),
            subject: $name,
            contact_id: $project->contact_id,
            project_id: $project->id,
        ))->attachClient($client)->create();
        try {
            $task = (new Task(
                user_id: $user->id,
                subject: $name,
                contact_id: $project->contact_id,
                project_id: $project->id,
                todo_status_id: $taskStatuses[0]->id,
                has_reminder: false,
            ))->attachClient($client)->create();
            try {
                expect($note->refresh()->project_id)->toBe($project->id)
                    ->and($task->refresh()->project_id)->toBe($project->id)
                    ->and($task->has_reminder)->toBeFalse();

                $foundNote = Note::useClient($client)->query()->where('subject', SearchCriteria::EQUAL, $name)->first();
                $foundTask = Task::useClient($client)->query()->where('subject', SearchCriteria::EQUAL, $name)->first();
                expect($foundNote->project_id)->toBe($project->id)
                    ->and($foundTask->project_id)->toBe($project->id)
                    ->and($foundTask->has_reminder)->toBeFalse();

                $note->subject .= ' updated';
                $task->subject .= ' updated';

                expect($note->update()->project_id)->toBe($project->id)
                    ->and($task->update()->project_id)->toBe($project->id);
            } finally {
                $task->delete();
            }
        } finally {
            $note->delete();
        }
    });
});
