<?php

declare(strict_types=1);

namespace Bexio\Resources\Files;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class FileSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria,
        public string $value
    ) {}
}
