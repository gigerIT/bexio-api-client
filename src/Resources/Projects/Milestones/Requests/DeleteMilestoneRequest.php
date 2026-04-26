<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteMilestoneRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly int $projectId,
        protected readonly int|string $milestoneId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId}/milestones/{$this->milestoneId}";
    }
}
