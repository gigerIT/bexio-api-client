<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Bexio\Resources\Projects\Projects\Project;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchProjectsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/pr_project/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Project::collect($response->json());
    }
}


