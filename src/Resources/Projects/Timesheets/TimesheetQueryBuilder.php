<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Timesheets;

use Bexio\Resources\Projects\Timesheets\Requests\SearchTimesheetsRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class TimesheetQueryBuilder extends QueryBuilder
{
    private Collection $searchClauses;

    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if (!isset($this->searchClauses)) {
            $this->searchClauses = new Collection();
        }

        $this->searchClauses->push(new TimesheetSearchWhereClause($field, $operator, $value));

        return $this;
    }

    public function search(): array
    {
        $request = new SearchTimesheetsRequest($this->searchClauses->toArray());
        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
        }

        return $request->createDtoFromResponse($response);
    }

    public function first(): mixed
    {
        if (isset($this->searchClauses) && $this->searchClauses->isNotEmpty()) {
            $results = $this->search();
            return $results[0] ?? null;
        }

        $results = $this->limit(1)->get();
        return $results[0] ?? null;
    }
}

