<?php
declare(strict_types=1);

namespace Bexio\Resources\Files;

use Bexio\Support\Data\SearchWhereClause;

class FileSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public \Bexio\Support\Data\SearchCriteria $criteria,
        public mixed $value
    ) {
    }
}

