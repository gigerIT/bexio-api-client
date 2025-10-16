<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAdditionalAddressesRequest extends Request
{

    const LIMIT_MAX = 2000;

    protected Method $method = Method::GET;


    public function __construct(
        protected int $contactId,
        protected int $limit = 500,
        protected int $offset = 0,
    ) {
        if ($limit > self::LIMIT_MAX) {
            throw new \InvalidArgumentException("Limit cannot be greater than " . self::LIMIT_MAX);
        }
        if ($offset < 0) {
            throw new \InvalidArgumentException("Offset cannot be less than 0");
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/additional_address";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }


    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        // Add contact_id to each address
        $data = array_map(function ($item) {
            $item['contact_id'] = $this->contactId;
            return $item;
        }, $data);
        return AdditionalAddress::collect($data);
    }
}

