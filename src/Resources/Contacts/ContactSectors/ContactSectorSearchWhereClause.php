<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactSectors;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class ContactSectorSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria,
        public string $value
    ) {}
}
