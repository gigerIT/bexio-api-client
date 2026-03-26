<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Countries\Requests;

use Bexio\Resources\Other\Countries\Country;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCountryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/country/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Country
    {
        return Country::from($response->json());
    }
}
