<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses;

use Bexio\BexioClient;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\SearchAdditionalAddressRequest;
use Bexio\Support\SearchableQueryBuilder;
use LogicException;

class AdditionalAddressQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchAdditionalAddressRequest::class;

    private ?int $contactId = null;

    public function __construct(string $resourceClass, BexioClient $client, ?int $contactId = null)
    {
        parent::__construct($resourceClass, $client);

        $this->contactId = $contactId;
    }

    /**
     * Set the contact ID for the query.
     */
    public function forContact(int $contactId): static
    {
        $this->contactId = $contactId;

        return $this;
    }

    protected function indexRequestArguments(): array
    {
        return [
            'contactId' => $this->requireContactId(),
            ...parent::indexRequestArguments(),
        ];
    }

    protected function searchRequestArguments(): array
    {
        return [
            'contactId' => $this->requireContactId(),
            'searchClauses' => $this->searchClausePayload(),
        ];
    }

    private function requireContactId(): int
    {
        if ($this->contactId === null) {
            throw new LogicException('Additional address queries require a contact id. Call forContact() first.');
        }

        return $this->contactId;
    }
}
