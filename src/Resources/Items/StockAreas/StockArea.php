<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockAreas;

use Bexio\Resources\Items\StockAreas\Requests\GetStockAreasRequest;
use Bexio\Resources\Resource;

/**
 * @method StockAreaQueryBuilder query()
 */
class StockArea extends Resource
{
    public const INDEX_REQUEST = GetStockAreasRequest::class;
    public const QUERY_BUILDER = StockAreaQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $stock_id = null,
    ) {
    }
}

