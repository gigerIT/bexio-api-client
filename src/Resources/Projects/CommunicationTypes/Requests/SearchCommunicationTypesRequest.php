<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes\Requests;

use Bexio\Resources\Projects\CommunicationTypes\CommunicationType;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchCommunicationTypesRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/communication_kind/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CommunicationType::collect($response->json());
    }
}


