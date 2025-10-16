<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactGroups;

use Bexio\Support\Data\SearchWhereClause;

class ContactGroupSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public \Bexio\Support\Data\SearchCriteria $criteria,
        public string $value
    )
    {
    }
}

