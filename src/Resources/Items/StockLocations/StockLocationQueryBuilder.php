<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockLocations;

use Bexio\Resources\Items\StockLocations\Requests\SearchStockLocationsRequest;
use Bexio\Support\SearchableQueryBuilder;

class StockLocationQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchStockLocationsRequest::class;
}
