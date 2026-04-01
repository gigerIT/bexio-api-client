<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\CalendarYears\Requests;

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchCalendarYearsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/calendar_years/search';
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CalendarYear::collect($response->json());
    }
}
