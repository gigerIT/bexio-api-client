<?php

namespace Bexio\Resources\Projects\Milestones\Requests;

use Bexio\Resources\Projects\Milestones\Milestone;
use Bexio\Resources\Projects\Projects\Project;

it('builds milestone requests with project context', function () {
    $milestone = new Milestone(
        project_id: 123,
        name: 'Planning',
        id: 456,
        end_date: '2026-05-31',
        comment: 'Initial planning',
        pr_parent_milestone_id: 789,
    );

    expect((new GetMilestonesRequest(123, 20, 5))->resolveEndpoint())
        ->toBe('/3.0/projects/123/milestones')
        ->and((new GetMilestoneRequest(123, 456))->resolveEndpoint())
        ->toBe('/3.0/projects/123/milestones/456')
        ->and((new CreateMilestoneRequest($milestone))->resolveEndpoint())
        ->toBe('/3.0/projects/123/milestones')
        ->and((new UpdateMilestoneRequest($milestone))->resolveEndpoint())
        ->toBe('/3.0/projects/123/milestones/456')
        ->and((new DeleteMilestoneRequest(123, 456))->resolveEndpoint())
        ->toBe('/3.0/projects/123/milestones/456');

    $body = new \ReflectionMethod(CreateMilestoneRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreateMilestoneRequest($milestone)))
        ->toMatchArray([
            'name' => 'Planning',
            'end_date' => '2026-05-31',
            'comment' => 'Initial planning',
            'pr_parent_milestone_id' => 789,
        ])
        ->not->toHaveKeys(['id', 'project_id']);
});

it('can create update fetch and delete a disposable milestone', function () {
    try {
        $project = Project::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Projects endpoint unavailable: ' . $e->getMessage());
    }

    if (! $project) {
        \PHPUnit\Framework\Assert::markTestSkipped('No projects available');
    }

    $milestone = (new Milestone(
        project_id: $project->id,
        name: 'API milestone ' . uniqid(),
        end_date: '2026-12-31',
        comment: 'Created by endpoint completion tests',
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $milestone->name .= ' updated';
        $updated = $milestone->update();
        $found = Milestone::useClient(testClient())
            ->forProject($project->id)
            ->find($milestone->id);

        expect($updated)->toBeInstanceOf(Milestone::class)
            ->and($updated->name)->toBe($milestone->name)
            ->and($found)->toBeInstanceOf(Milestone::class)
            ->and($found->id)->toBe($milestone->id);
    } finally {
        Milestone::useClient(testClient())
            ->forProject($project->id)
            ->delete($milestone->id);
    }
});
