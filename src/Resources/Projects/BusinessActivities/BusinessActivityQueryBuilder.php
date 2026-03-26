<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities;

use Bexio\Resources\Projects\BusinessActivities\Requests\SearchBusinessActivitiesRequest;
use Bexio\Support\SearchableQueryBuilder;

class BusinessActivityQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchBusinessActivitiesRequest::class;
}
