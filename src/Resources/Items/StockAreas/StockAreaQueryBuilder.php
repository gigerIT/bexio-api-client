<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockAreas;

use Bexio\Resources\Items\StockAreas\Requests\SearchStockAreasRequest;
use Bexio\Support\SearchableQueryBuilder;

class StockAreaQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchStockAreasRequest::class;
}
