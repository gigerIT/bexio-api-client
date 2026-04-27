<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactGroups\Requests;

use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchContactGroupRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/contact_group/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ContactGroup::collect($response->json());
    }
}

