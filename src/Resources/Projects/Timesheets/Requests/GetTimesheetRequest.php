<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTimesheetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/timesheet/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Timesheet
    {
        return Timesheet::from($response->json());
    }
}

