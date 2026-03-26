<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects;

use Bexio\Resources\Projects\Projects\Requests\SearchProjectsRequest;
use Bexio\Support\SearchableQueryBuilder;

class ProjectQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchProjectsRequest::class;
}
