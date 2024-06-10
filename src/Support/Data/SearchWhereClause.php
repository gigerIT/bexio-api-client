<?php
declare(strict_types=1);


namespace Bexio\Support\Data;

use Spatie\LaravelData\Data;

class SearchWhereClause extends Data
{
    public function __construct(
        public string         $field,
        public SearchCriteria $criteria = SearchCriteria::LIKE,
        public string         $value,
    )
    {
    }
}