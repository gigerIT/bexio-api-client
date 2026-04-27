<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchTimesheetsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/timesheet/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Timesheet::collect($response->json());
    }
}


