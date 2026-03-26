<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class ContactRelationSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria,
        public string $value
    ) {}
}
