<?php

declare(strict_types=1);

namespace Bexio\Resources\Items\StockAreas;

use Bexio\Support\Data\SearchCriteria;
use Spatie\LaravelData\Data;

class StockAreaSearchWhereClause extends Data
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria = SearchCriteria::LIKE,
        public string $value = '',
    ) {}
}
