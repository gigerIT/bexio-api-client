<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCalendarYearRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $uuid)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/calendar_years/{$this->uuid}";
    }

    public function createDtoFromResponse(Response $response): CalendarYear
    {
        return CalendarYear::from($response->json());
    }
}

