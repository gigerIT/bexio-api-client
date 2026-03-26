<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Countries\Requests;

use Bexio\Resources\Other\Countries\Country;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCountriesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/country';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Country::collect($response->json());
    }
}
