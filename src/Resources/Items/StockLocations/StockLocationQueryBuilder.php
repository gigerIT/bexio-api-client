<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockLocations;

use Bexio\Resources\Items\StockLocations\Requests\SearchStockLocationsRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class StockLocationQueryBuilder extends QueryBuilder
{
    private Collection $searchQuery;

    public function orderBy(string $field): static
    {
        $this->setParameter('order_by', $field);
        return $this;
    }

    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if (!isset($this->searchQuery)) {
            $this->searchQuery = new Collection();
        }

        $this->searchQuery->push(new StockLocationSearchWhereClause($field, $operator, $value));
        return $this;
    }

    public function search(): array
    {
        $request = new SearchStockLocationsRequest($this->searchQuery->toArray());
        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
        }

        return $request->createDtoFromResponse($response);
    }

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


