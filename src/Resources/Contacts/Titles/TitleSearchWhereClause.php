<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Titles;

use Bexio\Support\Data\SearchWhereClause;

class TitleSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public \Bexio\Support\Data\SearchCriteria $criteria,
        public mixed $value
    ) {
    }
}

