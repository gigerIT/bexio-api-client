<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets;

use Bexio\Resources\Projects\Timesheets\Requests\SearchTimesheetsRequest;
use Bexio\Support\SearchableQueryBuilder;

class TimesheetQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchTimesheetsRequest::class;
}
