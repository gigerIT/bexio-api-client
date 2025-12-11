<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetNoteRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/note/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Note
    {
        return Note::from($response->json());
    }
}

