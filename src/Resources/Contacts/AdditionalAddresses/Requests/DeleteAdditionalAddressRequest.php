<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteAdditionalAddressRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly int $contactId,
        protected readonly int $additionalAddressId
    ) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/additional_address/{$this->additionalAddressId}";
    }
}
