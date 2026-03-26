<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAdditionalAddressRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $contactId,
        protected int $additionalAddressId
    ) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/additional_address/{$this->additionalAddressId}";
    }

    public function createDtoFromResponse(Response $response): AdditionalAddress
    {
        $data = $response->json();
        $data['contact_id'] = $this->contactId;

        return AdditionalAddress::from($data);
    }
}
