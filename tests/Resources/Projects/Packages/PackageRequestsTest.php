<?php

namespace Bexio\Resources\Projects\Packages\Requests;

use Bexio\Resources\Projects\Packages\Package;
use Bexio\Resources\Projects\Projects\Project;

it('builds package requests with project context', function () {
    $package = new Package(
        project_id: 123,
        name: 'Implementation',
        id: 456,
        spent_time_in_hours: 1.25,
        estimated_time_in_hours: 8.5,
        comment: 'Build phase',
        pr_milestone_id: 789,
    );

    expect((new GetPackagesRequest(123, 20, 5))->resolveEndpoint())
        ->toBe('/3.0/projects/123/packages')
        ->and((new GetPackageRequest(123, 456))->resolveEndpoint())
        ->toBe('/3.0/projects/123/packages/456')
        ->and((new CreatePackageRequest($package))->resolveEndpoint())
        ->toBe('/3.0/projects/123/packages')
        ->and((new UpdatePackageRequest($package))->resolveEndpoint())
        ->toBe('/3.0/projects/123/packages/456')
        ->and((new DeletePackageRequest(123, 456))->resolveEndpoint())
        ->toBe('/3.0/projects/123/packages/456');

    $body = new \ReflectionMethod(CreatePackageRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreatePackageRequest($package)))
        ->toMatchArray([
            'name' => 'Implementation',
            'spent_time_in_hours' => 1.25,
            'estimated_time_in_hours' => 8.5,
            'comment' => 'Build phase',
            'pr_milestone_id' => 789,
        ])
        ->not->toHaveKeys(['id', 'project_id']);
});

it('can create update fetch and delete a disposable package', function () {
    try {
        $project = Project::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (! $project) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    $package = (new Package(
        project_id: $project->id,
        name: 'API package ' . uniqid(),
        estimated_time_in_hours: 1.0,
        comment: 'Created by endpoint completion tests',
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $package->name .= ' updated';
        $updated = $package->update();
        $found = Package::useClient(testClient())
            ->forProject($project->id)
            ->find($package->id);

        expect($updated)->toBeInstanceOf(Package::class)
            ->and($updated->name)->toBe($package->name)
            ->and($found)->toBeInstanceOf(Package::class)
            ->and($found->id)->toBe($package->id);
    } finally {
        Package::useClient(testClient())
            ->forProject($project->id)
            ->delete($package->id);
    }
});
