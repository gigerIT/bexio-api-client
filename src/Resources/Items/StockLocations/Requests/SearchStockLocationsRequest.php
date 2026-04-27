<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockLocations\Requests;

use Bexio\Resources\Items\StockLocations\StockLocation;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchStockLocationsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/stock/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return StockLocation::collect($response->json());
    }
}



