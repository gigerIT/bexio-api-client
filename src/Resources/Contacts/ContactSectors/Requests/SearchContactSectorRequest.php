<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactSectors\Requests;

use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchContactSectorRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return "/2.0/contact_branch/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ContactSector::collect($response->json());
    }
}

