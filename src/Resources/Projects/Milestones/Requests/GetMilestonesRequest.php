<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones\Requests;

use Bexio\Resources\Projects\Milestones\Milestone;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetMilestonesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $projectId,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId}/milestones";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Milestone::collect($this->withProjectId($response->json()));
    }

    private function withProjectId(array $milestones): array
    {
        return array_map(function (array $milestone): array {
            $milestone['project_id'] = $this->projectId;

            return $milestone;
        }, $milestones);
    }
}
