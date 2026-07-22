<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses;

use Bexio\Resources\Purchase\Concerns\BuildsPageBasedListQueries;
use Bexio\Support\QueryBuilder;

class ExpenseQueryBuilder extends QueryBuilder
{
    use BuildsPageBasedListQueries;
}
