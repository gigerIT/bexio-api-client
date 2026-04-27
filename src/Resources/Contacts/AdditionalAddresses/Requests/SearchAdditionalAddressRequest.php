<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchAdditionalAddressRequest extends SearchRequest
{
    public function __construct(
        protected readonly int $contactId,
        array $searchClauses = [],
    ) {
        parent::__construct($searchClauses);
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/additional_address/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return AdditionalAddress::collect($response->json());
    }
}
