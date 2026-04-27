<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchContactRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/contact/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Contact::collect($response->json());
    }
}
