<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchCalendarYearsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/calendar_years/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CalendarYear::collect($response->json());
    }
}
