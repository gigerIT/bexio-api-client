<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Salutations;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class SalutationSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria,
        public string $value
    ) {}
}
