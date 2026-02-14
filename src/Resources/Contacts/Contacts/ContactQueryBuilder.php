<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts;

use Bexio\Resources\Contacts\Contacts\Requests\SearchContactRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class ContactQueryBuilder extends QueryBuilder
{
    private Collection $searchQuery;

    /**
     * Include archived contacts in the results
     */
    public function withArchived(): static
    {
        $this->setParameter('showArchived', true);
        return $this;
    }

    /**
     * Add a where clause to the search query
     */
    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if (!isset($this->searchQuery)) {
            $this->searchQuery = new Collection();
        }

        $this->searchQuery->push(new ContactSearchWhereClause($field, $operator, $value));
        return $this;
    }

    /**
     * Execute a search query with the built where clauses
     */
    public function search(): array
    {
        $request = new SearchContactRequest($this->searchQuery->toArray());
        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
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
            return $results[0] ?? null;
        }

        $results = $this->limit(1)->get();
        return $results[0] ?? null;
    }
}

