<?php
declare(strict_types=1);

namespace Bexio\Resources\Files;

use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\Requests\SearchFilesRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class FileQueryBuilder extends QueryBuilder
{
    private ?Collection $searchQuery = null;

    /**
     * Filter by archived state.
     */
    public function archivedState(FileArchivedState $state): static
    {
        $this->setParameter('archivedState', $state);
        return $this;
    }

    /**
     * Add a where clause to the search query.
     */
    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if ($this->searchQuery === null) {
            $this->searchQuery = new Collection();
        }

        $this->searchQuery->push(new FileSearchWhereClause($field, $operator, $value));

        return $this;
    }

    /**
     * Define result ordering.
     */
    public function orderBy(string $orderBy): static
    {
        $this->setParameter('orderBy', $orderBy);
        return $this;
    }

    /**
     * Execute a search query with the built where clauses.
     */
    public function search(): array
    {
        $searchClauses = $this->searchQuery?->toArray() ?? [];

        $request = new SearchFilesRequest(
            searchClauses: $searchClauses,
            archivedState: $this->parameters->get('archivedState'),
            limit: $this->parameters->get('limit') ?? 500,
            offset: $this->parameters->get('offset') ?? 0,
        );

        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
        }

        return $request->createDtoFromResponse($response);
    }

    /**
     * Get the first result - uses search if where clauses are set, otherwise uses index with limit.
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
}

