<?php

use Bexio\BexioClient;
use Bexio\Resources\Projects\Milestones\Milestone;
use Bexio\Resources\Projects\Milestones\Requests\UpdateMilestoneRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('updates milestones with the live PATCH contract and retains project context', function () {
    $mock = new MockClient([
        UpdateMilestoneRequest::class => MockResponse::make(['id' => 17, 'name' => 'Updated milestone']),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);
    $milestone = new Milestone(project_id: 42, name: 'Updated milestone', id: 17, end_date: '2026-12-31');

    $updated = $milestone->attachClient($client)->update();

    expect($updated->project_id)->toBe(42)->and($updated->id)->toBe(17);
    $mock->assertSent(fn (UpdateMilestoneRequest $request): bool =>
        $request->getMethod() === Method::PATCH
        && $request->resolveEndpoint() === '/3.0/projects/42/milestones/17'
        && $request->body()->all() === [
            'name' => 'Updated milestone', 'end_date' => '2026-12-31',
            'comment' => null, 'pr_parent_milestone_id' => null,
        ]
    );
});
