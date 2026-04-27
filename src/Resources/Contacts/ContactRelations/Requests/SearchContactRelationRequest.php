<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchContactRelationRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/contact_relation/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ContactRelation::collect($response->json());
    }
}

