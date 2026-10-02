<?php

use Bexio\Resources\Other\Notes\Note;
use Bexio\Resources\Other\Tasks\Task;
use Bexio\Resources\Other\Tasks\Requests\UpdateTaskRequest;

it('preserves project references and reminder state when editing hydrated resources', function () {
    $note = Note::from(['id' => 10, 'pr_project_id' => 42, 'subject' => 'Review']);
    $task = Task::from(['id' => 11, 'pr_project_id' => 42, 'have_remember' => false, 'subject' => 'Review']);

    expect($note->project_id)->toBe(42)
        ->and($note->toApi()['pr_project_id'])->toBe(42)
        ->and($task->project_id)->toBe(42)
        ->and($task->has_reminder)->toBeFalse()
        ->and($task->toApi()['have_remember'])->toBeFalse()
        ->and((new UpdateTaskRequest($task))->body()->all())
        ->toHaveKey('pr_project_id', 42)
        ->not->toHaveKeys(['project_id', 'has_reminder', 'have_remember']);
});

it('interprets the string reminder flags returned by live tasks', function (string $wireValue, bool $expected) {
    $task = Task::from(['has_reminder' => $wireValue]);

    expect($task->has_reminder)->toBe($expected)
        ->and($task->toApi()['have_remember'])->toBe($expected);
})->with([
    'disabled' => ['false', false],
    'enabled' => ['true', true],
]);
