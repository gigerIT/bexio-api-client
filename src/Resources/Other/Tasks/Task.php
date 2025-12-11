<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks;

use Bexio\Resources\Other\Tasks\Requests\GetTaskRequest;
use Bexio\Resources\Other\Tasks\Requests\GetTasksRequest;
use Bexio\Resources\Resource;

class Task extends Resource
{
    public const INDEX_REQUEST = GetTasksRequest::class;
    public const SHOW_REQUEST = GetTaskRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?int $user_id = null,
        public ?string $finish_date = null,
        public ?string $subject = null,
        public ?int $place = null,
        public ?string $info = null,
        public ?int $contact_id = null,
        public ?int $sub_contact_id = null,
        public ?int $project_id = null,
        public ?int $entry_id = null,
        public ?int $module_id = null,
        public ?int $todo_status_id = null,
        public ?int $todo_priority_id = null,
        public ?bool $has_reminder = null,
        public ?int $remember_type_id = null,
        public ?int $remember_time_id = null,
        public ?int $communication_kind_id = null,
    ) {
    }
}

