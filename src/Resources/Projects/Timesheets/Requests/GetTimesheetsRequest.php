<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTimesheetsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/timesheet';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Timesheet::collect($response->json());
    }
}
