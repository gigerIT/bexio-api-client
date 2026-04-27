<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Salutations\Requests;

use Bexio\Resources\Contacts\Salutations\Salutation;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchSalutationRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/salutation/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Salutation::collect($response->json());
    }
}

