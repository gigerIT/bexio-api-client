<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones;

use Bexio\Resources\Projects\Milestones\Requests\CreateMilestoneRequest;
use Bexio\Resources\Projects\Milestones\Requests\DeleteMilestoneRequest;
use Bexio\Resources\Projects\Milestones\Requests\GetMilestoneRequest;
use Bexio\Resources\Projects\Milestones\Requests\GetMilestonesRequest;
use Bexio\Resources\Projects\Milestones\Requests\UpdateMilestoneRequest;
use Bexio\Resources\Resource;
use LogicException;

/**
 * @method MilestoneQueryBuilder query()
 */
class Milestone extends Resource
{
    public const INDEX_REQUEST = GetMilestonesRequest::class;
    public const SHOW_REQUEST = GetMilestoneRequest::class;
    public const CREATE_REQUEST = CreateMilestoneRequest::class;
    public const UPDATE_REQUEST = UpdateMilestoneRequest::class;
    public const DELETE_REQUEST = DeleteMilestoneRequest::class;
    public const QUERY_BUILDER = MilestoneQueryBuilder::class;

    public function __construct(
        public ?int $project_id = null,
        public ?string $name = null,
        public ?int $id = null,
        public ?string $end_date = null,
        public ?string $comment = null,
        public ?int $pr_parent_milestone_id = null,
    ) {
    }

    public function forProject(int $projectId): static
    {
        $this->project_id = $projectId;

        return $this;
    }

    public function find(int|string $id): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $this->requireProjectId(), $id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function delete(string|int|null $id = null): bool
    {
        $request = $this->newRequestInstance(
            static::DELETE_REQUEST,
            $this->requireProjectId(),
            $id ?? $this->resolveResourceId(),
        );
        $response = $this->client()->send($request);

        return $response->successful();
    }

    private function requireProjectId(): int
    {
        if ($this->project_id === null) {
            throw new LogicException('Milestone operations require a project id. Call forProject() or set project_id first.');
        }

        return $this->project_id;
    }
}
