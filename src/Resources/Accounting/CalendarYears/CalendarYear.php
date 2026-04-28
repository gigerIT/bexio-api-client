<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears;

use Bexio\Resources\Accounting\CalendarYears\Requests\CreateCalendarYearRequest;
use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearRequest;
use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearsRequest;
use Bexio\Resources\Resource;
use Spatie\LaravelData\Attributes\MapInputName;

/**
 * @method CalendarYearQueryBuilder query()
 */
class CalendarYear extends Resource
{
    public const INDEX_REQUEST = GetCalendarYearsRequest::class;
    public const QUERY_BUILDER = CalendarYearQueryBuilder::class;
    public const SHOW_REQUEST = GetCalendarYearRequest::class;
    public const CREATE_REQUEST = CreateCalendarYearRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        #[MapInputName('start')]
        public ?string $date_start = null,
        #[MapInputName('end')]
        public ?string $date_end = null,
        public ?string $year = null,
        public ?bool $is_vat_subject = null,
        public ?bool $is_annual_reporting = null,
        public ?string $vat_accounting_method = null,
        public ?string $vat_accounting_type = null,
        public ?int $default_tax_income_id = null,
        public ?int $default_tax_expense_id = null,
    ) {
    }

    public function toApi(): CalendarYear
    {
        return $this->except('id', 'uuid', 'date_start', 'date_end');
    }
}

