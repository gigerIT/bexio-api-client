<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Bexio\Resources\Other\Tasks\Requests\CreateTaskRequest;
use Bexio\Resources\Other\Tasks\Requests\DeleteTaskRequest;
use Bexio\Resources\Other\Tasks\Requests\GetTaskPrioritiesRequest;
use Bexio\Resources\Other\Tasks\Requests\GetTaskStatusesRequest;
use Bexio\Resources\Other\Tasks\Requests\UpdateTaskRequest;
use Bexio\Resources\Other\Tasks\TaskPriority;
use Bexio\Resources\Other\Tasks\TaskStatus;
use Bexio\Resources\Other\Users\User;
use Bexio\Support\Data\SearchCriteria;

it('can get Tasks', function () {
    $tasks = Task::useClient(testClient())->all();

    if (count($tasks) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No tasks available');
    }

    expect($tasks)->toBeArray()
        ->and($tasks[0])->toBeInstanceOf(Task::class)
        ->and($tasks[0]->id)->toBeInt();
});

it('can get a Task', function () {
    $tasks = Task::useClient(testClient())->all();
    if (count($tasks) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No tasks available');
    }

    $task = Task::useClient(testClient())->find($tasks[0]->id);

    expect($task)->toBeInstanceOf(Task::class)
        ->and($task->id)->toBeInt()
        ->and($task->subject)->toBeString();
});

it('can search Tasks', function () {
    $tasks = Task::useClient(testClient())->all();

    if (count($tasks) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No tasks available');
    }

    $searchable = collect($tasks)->first(fn (Task $task): bool => filled($task->subject));

    if (! $searchable) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable task available');
    }

    $results = Task::useClient(testClient())
        ->query()
        ->where('subject', SearchCriteria::LIKE, $searchable->subject)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Task::class);
});

it('can get first Task using query builder', function () {
    $task = Task::useClient(testClient())->query()->first();

    if (!$task) {
        \PHPUnit\Framework\Assert::markTestSkipped('No tasks available');
    }

    expect($task)->toBeInstanceOf(Task::class)
        ->and($task->id)->toBeInt();
});

it('builds task write and lookup requests with API payload names', function () {
    $task = new Task(
        id: 123,
        user_id: 1,
        finish_date: '2026-04-27T07:44:10+00:00',
        subject: 'Send documents',
        info: 'soon',
        contact_id: 14,
        sub_contact_id: null,
        project_id: 15,
        entry_id: null,
        module_id: null,
        todo_status_id: 1,
        todo_priority_id: null,
        has_reminder: false,
        remember_type_id: null,
        remember_time_id: null,
        communication_kind_id: null,
    );

    expect((new CreateTaskRequest($task))->resolveEndpoint())
        ->toBe('/2.0/task')
        ->and((new UpdateTaskRequest($task))->resolveEndpoint())
        ->toBe('/2.0/task/123')
        ->and((new DeleteTaskRequest(123))->resolveEndpoint())
        ->toBe('/2.0/task/123')
        ->and((new GetTaskPrioritiesRequest())->resolveEndpoint())
        ->toBe('/2.0/todo_priority')
        ->and((new GetTaskStatusesRequest())->resolveEndpoint())
        ->toBe('/2.0/todo_status');

    $body = new \ReflectionMethod(CreateTaskRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreateTaskRequest($task)))
        ->toMatchArray([
            'user_id' => 1,
            'finish_date' => '2026-04-27T07:44:10+00:00',
            'subject' => 'Send documents',
            'info' => 'soon',
            'contact_id' => 14,
            'pr_project_id' => 15,
            'todo_status_id' => 1,
            'have_remember' => false,
        ])
        ->not->toHaveKeys([
            'id',
            'project_id',
            'has_reminder',
            'place',
            'sub_contact_id',
            'entry_id',
            'module_id',
            'todo_priority_id',
            'remember_type_id',
            'remember_time_id',
            'communication_kind_id',
        ]);
});

it('can get Task priorities and statuses', function () {
    $priorities = Task::priorities(testClient());
    $statuses = Task::statuses(testClient());

    expect($priorities)->toBeArray()
        ->and($priorities[0])->toBeInstanceOf(TaskPriority::class)
        ->and($priorities[0]->id)->toBeInt()
        ->and($statuses)->toBeArray()
        ->and($statuses[0])->toBeInstanceOf(TaskStatus::class)
        ->and($statuses[0]->id)->toBeInt();
});

it('can create update and delete a disposable Task', function () {
    $user = User::useClient(testClient())->me();
    $statuses = Task::statuses(testClient());

    if (count($statuses) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No task statuses available');
    }

    $task = (new Task(
        user_id: $user->id,
        finish_date: now()->addDay()->toIso8601String(),
        subject: 'API task ' . uniqid(),
        info: 'Created by endpoint completion tests',
        todo_status_id: $statuses[0]->id,
        has_reminder: false,
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $task->subject .= ' updated';
        $updated = $task->update();

        expect($updated)->toBeInstanceOf(Task::class)
            ->and($updated->subject)->toBe($task->subject);
    } finally {
        $task->delete();
    }
});
