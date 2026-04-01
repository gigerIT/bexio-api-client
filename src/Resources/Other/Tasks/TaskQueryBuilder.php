<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks;

use Bexio\Resources\Other\Tasks\Requests\SearchTasksRequest;
use Bexio\Support\SearchableQueryBuilder;

class TaskQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchTasksRequest::class;
}
