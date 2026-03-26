<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\AdditionalAddresses;

use Bexio\BexioClient;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\SearchAdditionalAddressRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class AdditionalAddressQueryBuilder extends QueryBuilder
{
    private Collection $searchQuery;

    private int $contactId;

    public function __construct(
        protected string $resourceClass,
        protected BexioClient $client,
        int $contactId = 0,
    ) {
        parent::__construct($resourceClass, $client);
        $this->contactId = $contactId;
        $this->parameters = new Collection;
    }

    /**
     * Set the contact ID for the query
     */
    public function forContact(int $contactId): static
    {
        $this->contactId = $contactId;

        return $this;
    }

    /**
     * Add a where clause to the search query
     */
    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if (! isset($this->searchQuery)) {
            $this->searchQuery = new Collection;
        }

        $this->searchQuery->put($field, new AdditionalAddressSearchWhereClause($field, $operator, $value));

        return $this;
    }

    /**
     * Execute a search query with the built where clauses
     */
    public function search(): array
    {
        $request = new SearchAdditionalAddressRequest($this->contactId, $this->searchQuery->toArray());
        $response = $this->client->send($request);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to fetch resources: '.$response->json());
        }

        return $request->createDtoFromResponse($response);
    }

    /**
     * Get the first result - uses search if where clauses are set, otherwise uses index with limit
     */
    public function first(): mixed
    {
        if (isset($this->searchQuery) && $this->searchQuery->isNotEmpty()) {
            $results = $this->search();
        } else {
            $this->limit(1);
            $results = $this->get();
        }

        return $results[0] ?? null;
    }

    /**
     * Override to use contactId parameter
     */
    protected function createRequestWithParameters(string $requestClass): object
    {
        $reflection = new \ReflectionClass($requestClass);
        $constructor = $reflection->getConstructor();

        if (! $constructor) {
            return new $requestClass;
        }

        $params = $constructor->getParameters();
        $args = [];

        foreach ($params as $param) {
            $paramName = $param->getName();

            if ($paramName === 'contactId') {
                $args[] = $this->contactId;
            } elseif ($this->parameters->has($paramName)) {
                $args[] = $this->parameters->get($paramName);
            } elseif ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();
            }
        }

        return new $requestClass(...$args);
    }
}
