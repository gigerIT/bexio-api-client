<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetProjectsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/pr_project';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Project::collect($response->json());
    }
}


