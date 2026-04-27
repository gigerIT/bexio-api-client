<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Titles\Requests;

use Bexio\Resources\Contacts\Titles\Title;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchTitleRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/title/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Title::collect($response->json());
    }
}

