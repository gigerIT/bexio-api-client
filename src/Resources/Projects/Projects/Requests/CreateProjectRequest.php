<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateProjectRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Project $project)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/pr_project';
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


