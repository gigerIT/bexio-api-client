<?php

declare(strict_types=1);

namespace Bexio\Resources\Items\StockLocations;

use Bexio\Resources\Items\StockLocations\Requests\GetStockLocationsRequest;
use Bexio\Resources\Resource;

/**
 * @method StockLocationQueryBuilder query()
 */
class StockLocation extends Resource
{
    public const INDEX_REQUEST = GetStockLocationsRequest::class;

    public const QUERY_BUILDER = StockLocationQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {}
}
