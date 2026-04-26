<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Milestones\Requests;

use Bexio\Resources\Projects\Milestones\Milestone;
use LogicException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMilestoneRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Milestone $milestone)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/projects/{$this->projectId()}/milestones/{$this->milestoneId()}";
    }

    protected function defaultBody(): array
    {
        return $this->milestone->except('id', 'project_id')->toArray();
    }

    public function createDtoFromResponse(Response $response): Milestone
    {
        $data = $response->json();
        $data['project_id'] = $this->projectId();

        return Milestone::from($data);
    }

    private function projectId(): int
    {
        if ($this->milestone->project_id === null) {
            throw new LogicException('Milestone update requests require project_id.');
        }

        return $this->milestone->project_id;
    }

    private function milestoneId(): int
    {
        if ($this->milestone->id === null) {
            throw new LogicException('Milestone update requests require id.');
        }

        return $this->milestone->id;
    }
}
