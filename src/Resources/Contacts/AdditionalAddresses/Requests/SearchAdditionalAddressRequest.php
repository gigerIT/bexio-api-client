<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchAdditionalAddressRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $contactId,
        protected readonly array $searchClauses = []
    ) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/additional_address/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return AdditionalAddress::collect($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }
}
