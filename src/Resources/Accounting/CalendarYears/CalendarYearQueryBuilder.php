<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears;

use Bexio\Resources\Accounting\CalendarYears\Requests\SearchCalendarYearsRequest;
use Bexio\Support\SearchableQueryBuilder;

class CalendarYearQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchCalendarYearsRequest::class;
}
