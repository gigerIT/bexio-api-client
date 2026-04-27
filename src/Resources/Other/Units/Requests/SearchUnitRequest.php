<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Units\Requests;

use Bexio\Resources\Other\Units\Unit;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchUnitRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/unit/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Unit::collect($response->json());
    }
}
