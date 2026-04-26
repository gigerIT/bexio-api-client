<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones\Requests;

use Bexio\Resources\Projects\Milestones\Milestone;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetMilestoneRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $projectId,
        protected readonly int|string $milestoneId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId}/milestones/{$this->milestoneId}";
    }

    public function createDtoFromResponse(Response $response): Milestone
    {
        $data = $response->json();
        $data['project_id'] = $this->projectId;

        return Milestone::from($data);
    }
}
