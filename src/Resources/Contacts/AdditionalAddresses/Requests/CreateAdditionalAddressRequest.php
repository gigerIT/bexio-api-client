<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateAdditionalAddressRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected AdditionalAddress $additionalAddress)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->additionalAddress->contact_id}/additional_address";
    }

    protected function defaultBody(): array
    {
        return $this->additionalAddress->except("id", "contact_id", 'address')->toArray();
    }

    public function createDtoFromResponse(Response $response): AdditionalAddress
    {
        $data = $response->json();
        $data['contact_id'] = $this->additionalAddress->contact_id;
        return AdditionalAddress::from($data);
    }

}

