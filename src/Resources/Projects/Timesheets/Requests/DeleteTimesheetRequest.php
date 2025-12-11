<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteTimesheetRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(readonly protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/timesheet/{$this->id}";
    }
}

