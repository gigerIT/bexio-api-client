<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes;

use Bexio\Resources\Other\Notes\Requests\GetNoteRequest;
use Bexio\Resources\Other\Notes\Requests\GetNotesRequest;
use Bexio\Resources\Resource;

class Note extends Resource
{
    public const INDEX_REQUEST = GetNotesRequest::class;
    public const SHOW_REQUEST = GetNoteRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?int $user_id = null,
        public ?string $event_start = null,
        public ?string $subject = null,
        public ?string $info = null,
        public ?int $contact_id = null,
        public ?int $project_id = null,
        public ?int $entry_id = null,
        public ?int $module_id = null,
    ) {
    }
}

