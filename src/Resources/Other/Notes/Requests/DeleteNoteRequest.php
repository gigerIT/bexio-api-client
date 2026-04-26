<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteNoteRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $noteId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/note/{$this->noteId}";
    }
}
