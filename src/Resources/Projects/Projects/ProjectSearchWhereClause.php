<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class ProjectSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria = SearchCriteria::LIKE,
        public string $value = '',
    ) {
        parent::__construct($field, $criteria, $value);
    }
}

