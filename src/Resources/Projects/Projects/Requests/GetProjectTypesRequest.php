<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetProjectTypesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/pr_project_type';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}


