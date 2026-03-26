<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\Items;

use Bexio\Resources\Items\Items\Requests\SearchItemsRequest;
use Bexio\Support\SearchableQueryBuilder;

class ItemQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchItemsRequest::class;
}
