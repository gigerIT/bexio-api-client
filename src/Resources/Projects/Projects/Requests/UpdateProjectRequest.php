<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateProjectRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Project $project) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/pr_project/{$this->project->id}";
    }

    protected function defaultBody(): array
    {
        return $this->project->except('id', 'uuid', 'nr')->toArray();
    }

    public function createDtoFromResponse(Response $response): Project
    {
        return Project::from($response->json());
    }
}
