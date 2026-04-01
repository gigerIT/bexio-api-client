<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Units;

use Bexio\Resources\Other\Units\Requests\SearchUnitRequest;
use Bexio\Support\SearchableQueryBuilder;

class UnitQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchUnitRequest::class;
}
