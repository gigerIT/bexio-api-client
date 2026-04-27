<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchNotesRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/note/search';
    }
    public function createDtoFromResponse(Response $response): array
    {
        return Note::collect($response->json());
    }
}
