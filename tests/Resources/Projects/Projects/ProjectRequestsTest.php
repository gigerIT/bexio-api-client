<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Bexio\Support\Data\SearchCriteria;

it('can get Projects', function () {
    try {
        $projects = Project::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (count($projects) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    expect($projects)->toBeArray()
        ->and($projects[0])->toBeInstanceOf(Project::class)
        ->and($projects[0]->id)->toBeInt();
});

it('can get a Project', function () {
    try {
        $projects = Project::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (count($projects) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    $project = Project::useClient(testClient())->find($projects[0]->id);

    expect($project)->toBeInstanceOf(Project::class)
        ->and($project->id)->toBeInt();
});

it('can search Projects', function () {
    try {
        $projects = Project::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (count($projects) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    $searchable = $projects[0];

    if (!$searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable project name available');
    }

    $results = Project::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Project::class);
});

it('can get first Project using query builder', function () {
    try {
        $project = Project::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (!$project) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    expect($project)->toBeInstanceOf(Project::class)
        ->and($project->id)->toBeInt();
});


