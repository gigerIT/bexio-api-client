<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Bexio\Resources\Projects\Timesheets\Timesheet;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateTimesheetRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Timesheet $timesheet) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/timesheet/{$this->timesheet->id}";
    }

    protected function defaultBody(): array
    {
        return $this->timesheet->except('id')->toArray();
    }

    public function createDtoFromResponse(Response $response): Timesheet
    {
        return Timesheet::from($response->json());
    }
}
