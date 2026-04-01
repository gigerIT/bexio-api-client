<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Tasks\Task;
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

