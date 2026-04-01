<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears;

use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearRequest;
use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearsRequest;
use Bexio\Resources\Resource;

/**
 * @method CalendarYearQueryBuilder query()
 */
class CalendarYear extends Resource
{
    public const INDEX_REQUEST = GetCalendarYearsRequest::class;
    public const QUERY_BUILDER = CalendarYearQueryBuilder::class;
    public const SHOW_REQUEST = GetCalendarYearRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $date_start = null,
        public ?string $date_end = null,
    ) {
    }
}

