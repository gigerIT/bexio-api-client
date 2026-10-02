<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Bexio\Support\Data\SearchCriteria;

it('can get Projects', function () {
    withTestProject(function (): void {
        $projects = Project::useClient(testClient())->query()->limit(2)->get();

        expect($projects)->toBeArray()->not->toBeEmpty()
            ->and($projects[0])->toBeInstanceOf(Project::class)
            ->and($projects[0]->id)->toBeInt();
    });
});

it('can get a Project', function () {
    withTestProject(function (Project $fixture): void {
        $project = Project::useClient(testClient())->find($fixture->id);

        expect($project)->toBeInstanceOf(Project::class)
            ->and($project->id)->toBe($fixture->id);
    });
});

it('can search Projects', function () {
    withTestProject(function (Project $fixture): void {
        $results = Project::useClient(testClient())->query()
            ->where('name', SearchCriteria::EQUAL, $fixture->name)
            ->get();

        expect($results)->toHaveCount(1)
            ->and($results[0]->id)->toBe($fixture->id);
    });
});

it('can get first Project using query builder', function () {
    withTestProject(function (Project $fixture): void {
        $project = Project::useClient(testClient())->query()
            ->where('name', SearchCriteria::EQUAL, $fixture->name)
            ->first();

        expect($project)->toBeInstanceOf(Project::class)
            ->and($project->id)->toBe($fixture->id);
    });
});
