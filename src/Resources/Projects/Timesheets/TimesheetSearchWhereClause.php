<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;

class TimesheetSearchWhereClause extends SearchWhereClause
{
    public function __construct(
        public string $field,
        public SearchCriteria $criteria = SearchCriteria::LIKE,
        public string $value = '',
    ) {
        parent::__construct($field, $criteria, $value);
    }
}
