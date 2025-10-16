<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses;

use Bexio\Resources\Contacts\AdditionalAddresses\Requests\CreateAdditionalAddressRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\DeleteAdditionalAddressRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\GetAdditionalAddressesRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\GetAdditionalAddressRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\UpdateAdditionalAddressRequest;
use Bexio\Resources\Resource;

/**
 * @method AdditionalAddressQueryBuilder query()
 */
class AdditionalAddress extends Resource
{
    const INDEX_REQUEST = GetAdditionalAddressesRequest::class;
    const SHOW_REQUEST = GetAdditionalAddressRequest::class;
    const CREATE_REQUEST = CreateAdditionalAddressRequest::class;
    const UPDATE_REQUEST = UpdateAdditionalAddressRequest::class;
    const DELETE_REQUEST = DeleteAdditionalAddressRequest::class;
    const QUERY_BUILDER = AdditionalAddressQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?int $contact_id = null,
        public ?string $name = null,
        public ?string $address = null,
        public ?string $postcode = null,
        public ?string $city = null,
        public ?int $country_id = null,
        public ?string $subject = null,
        public ?string $description = null,
    ) {
    }

    /**
     * Override find to include contact_id
     */
    public function find(int|string $id): static
    {
        if (!$this->contact_id) {
            throw new \RuntimeException("contact_id is required to find an AdditionalAddress");
        }

        $request = $this->newRequestInstance(
            static::SHOW_REQUEST,
            $this->contact_id,
            $id
        );
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    /**
     * Override delete to include contact_id
     */
    public function delete(string|int|null $id = null): bool
    {
        if (!$this->contact_id) {
            throw new \RuntimeException("contact_id is required to delete an AdditionalAddress");
        }

        $request = $this->newRequestInstance(
            static::DELETE_REQUEST,
            $this->contact_id,
            $id ?? $this->id
        );
        $response = $this->client()->send($request);
        return $response->successful();
    }
}

