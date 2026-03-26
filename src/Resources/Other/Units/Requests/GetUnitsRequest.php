<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Units\Requests;

use Bexio\Resources\Other\Units\Unit;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetUnitsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/unit';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Unit::collect($response->json());
    }
}
