<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets;

use Bexio\Resources\Projects\Timesheets\Requests\CreateTimesheetRequest;
use Bexio\Resources\Projects\Timesheets\Requests\DeleteTimesheetRequest;
use Bexio\Resources\Projects\Timesheets\Requests\GetTimesheetRequest;
use Bexio\Resources\Projects\Timesheets\Requests\GetTimesheetsRequest;
use Bexio\Resources\Projects\Timesheets\Requests\UpdateTimesheetRequest;
use Bexio\Resources\Resource;

/**
 * @method TimesheetQueryBuilder query()
 */
class Timesheet extends Resource
{
    public const INDEX_REQUEST = GetTimesheetsRequest::class;
    public const SHOW_REQUEST = GetTimesheetRequest::class;
    public const CREATE_REQUEST = CreateTimesheetRequest::class;
    public const UPDATE_REQUEST = UpdateTimesheetRequest::class;
    public const DELETE_REQUEST = DeleteTimesheetRequest::class;
    public const QUERY_BUILDER = TimesheetQueryBuilder::class;

    public function __construct(
        public int $user_id,
        public bool $allowable_bill,
        public int $client_service_id,
        public ?int $id = null,
        public ?int $status_id = null,
        public ?string $text = null,
        public ?string $charge = null,
        public ?int $contact_id = null,
        public ?int $sub_contact_id = null,
        public ?int $pr_project_id = null,
        public ?int $pr_package_id = null,
        public ?int $pr_milestone_id = null,
        public ?string $travel_time = null,
        public ?string $travel_charge = null,
        public ?float $travel_distance = null,
        public ?string $estimated_time = null,
        public ?string $date = null,
        public ?string $duration = null,
        public ?bool $running = null,
        public array $tracking = [],
    ) {
    }
}


