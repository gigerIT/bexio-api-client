<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Purchase\Concerns\BuildsPageBasedListQueries;
use Bexio\Support\QueryBuilder;

class BillQueryBuilder extends QueryBuilder
{
    use BuildsPageBasedListQueries;
}
