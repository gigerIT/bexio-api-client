<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetProjectRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/pr_project/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Project
    {
        return Project::from($response->json());
    }
}

