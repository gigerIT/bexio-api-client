<?php

declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCalendarYearsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/calendar_years';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CalendarYear::collect($response->json());
    }
}
