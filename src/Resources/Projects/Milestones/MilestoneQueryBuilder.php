<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones;

use Bexio\BexioClient;
use Bexio\Support\QueryBuilder;
use LogicException;

class MilestoneQueryBuilder extends QueryBuilder
{
    private ?int $projectId = null;

    public function __construct(string $resourceClass, BexioClient $client, ?int $projectId = null)
    {
        parent::__construct($resourceClass, $client);

        $this->projectId = $projectId;
    }

    public function forProject(int $projectId): static
    {
        $this->projectId = $projectId;

        return $this;
    }

    protected function indexRequestArguments(): array
    {
        return [
            'projectId' => $this->requireProjectId(),
            ...parent::indexRequestArguments(),
        ];
    }

    private function requireProjectId(): int
    {
        if ($this->projectId === null) {
            throw new LogicException('Milestone queries require a project id. Call forProject() first.');
        }

        return $this->projectId;
    }
}
