<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Packages;

use Bexio\Resources\Projects\Packages\Requests\CreatePackageRequest;
use Bexio\Resources\Projects\Packages\Requests\DeletePackageRequest;
use Bexio\Resources\Projects\Packages\Requests\GetPackageRequest;
use Bexio\Resources\Projects\Packages\Requests\GetPackagesRequest;
use Bexio\Resources\Projects\Packages\Requests\UpdatePackageRequest;
use Bexio\Resources\Resource;
use LogicException;

/**
 * @method PackageQueryBuilder query()
 */
class Package extends Resource
{
    public const INDEX_REQUEST = GetPackagesRequest::class;
    public const SHOW_REQUEST = GetPackageRequest::class;
    public const CREATE_REQUEST = CreatePackageRequest::class;
    public const UPDATE_REQUEST = UpdatePackageRequest::class;
    public const DELETE_REQUEST = DeletePackageRequest::class;
    public const QUERY_BUILDER = PackageQueryBuilder::class;

    public function __construct(
        public ?int $project_id = null,
        public ?string $name = null,
        public ?int $id = null,
        public int|float|null $spent_time_in_hours = null,
        public int|float|null $estimated_time_in_hours = null,
        public ?string $comment = null,
        public ?int $pr_milestone_id = null,
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
            throw new LogicException('Package operations require a project id. Call forProject() or set project_id first.');
        }

        return $this->project_id;
    }
}
