<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Units\Requests;

use Bexio\Resources\Other\Units\Unit;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetUnitRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/unit/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Unit
    {
        return Unit::from($response->json());
    }
}
