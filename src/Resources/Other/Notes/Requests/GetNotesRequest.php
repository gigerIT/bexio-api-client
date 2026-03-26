<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetNotesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/note';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Note::collect($response->json());
    }
}
