<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes;

use Bexio\Resources\Other\Notes\Requests\CreateNoteRequest;
use Bexio\Resources\Other\Notes\Requests\DeleteNoteRequest;
use Bexio\Resources\Other\Notes\Requests\GetNoteRequest;
use Bexio\Resources\Other\Notes\Requests\GetNotesRequest;
use Bexio\Resources\Other\Notes\Requests\UpdateNoteRequest;
use Bexio\Resources\Resource;

/**
 * @method NoteQueryBuilder query()
 */
class Note extends Resource
{
    public const INDEX_REQUEST = GetNotesRequest::class;
    public const QUERY_BUILDER = NoteQueryBuilder::class;
    public const SHOW_REQUEST = GetNoteRequest::class;
    public const CREATE_REQUEST = CreateNoteRequest::class;
    public const UPDATE_REQUEST = UpdateNoteRequest::class;
    public const DELETE_REQUEST = DeleteNoteRequest::class;

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

    public function toApi(): array
    {
        return [
            'user_id' => $this->user_id,
            'event_start' => $this->event_start,
            'subject' => $this->subject,
            'info' => $this->info,
            'contact_id' => $this->contact_id,
            'pr_project_id' => $this->project_id,
            'entry_id' => $this->entry_id,
            'module_id' => $this->module_id,
        ];
    }
}

