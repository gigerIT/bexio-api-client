<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockAreas\Requests;

use Bexio\Resources\Items\StockAreas\StockArea;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchStockAreasRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/stock_place/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return StockArea::collect($response->json());
    }
}



