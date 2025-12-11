<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchTimesheetsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/timesheet/search';
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Timesheet::collect($response->json());
    }
}


