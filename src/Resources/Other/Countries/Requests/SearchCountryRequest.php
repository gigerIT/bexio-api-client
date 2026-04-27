<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Countries\Requests;

use Bexio\Resources\Other\Countries\Country;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchCountryRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/country/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Country::collect($response->json());
    }
}
