<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\TimesheetStatuses;

use Bexio\Resources\Projects\TimesheetStatuses\Requests\GetTimesheetStatusesRequest;
use Bexio\Resources\Resource;

class TimesheetStatus extends Resource
{
    public const INDEX_REQUEST = GetTimesheetStatusesRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}
