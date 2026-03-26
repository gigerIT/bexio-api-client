<?php
declare(strict_types=1);

namespace Bexio\Support;

use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\Data\SearchWhereClause;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use LogicException;
use Saloon\Http\Request;

abstract class SearchableQueryBuilder extends QueryBuilder
{
    protected const SEARCH_REQUEST = null;

    protected Collection $searchClauses;

    public function __construct(string $resourceClass, \Bexio\BexioClient $client)
    {
        parent::__construct($resourceClass, $client);

        $this->searchClauses = new Collection();
    }

    public function where(string $field, SearchCriteria $operator, mixed $value): static
    {
        return $this->addSearchClause(new SearchWhereClause($field, $operator, $value));
    }

    public function whereIn(string $field, array $values): static
    {
        return $this->where($field, SearchCriteria::IN, array_values($values));
    }

    public function whereNull(string $field): static
    {
        return $this->where($field, SearchCriteria::IS_NULL, null);
    }

    public function whereNotNull(string $field): static
    {
        return $this->where($field, SearchCriteria::NOT_NULL, null);
    }

    public function whereBetween(string $field, array $values): static
    {
        if (count($values) !== 2) {
            throw new InvalidArgumentException('whereBetween expects exactly two values.');
        }

        [$from, $to] = array_values($values);

        return $this
            ->where($field, SearchCriteria::GREATER_EQUAL, $from)
            ->where($field, SearchCriteria::LESS_EQUAL, $to);
    }

    public function get(): array
    {
        if ($this->hasSearchClauses()) {
            return $this->executeSearch();
        }

        return parent::get();
    }

    public function first(): mixed
    {
        $builder = clone $this;

        $results = $builder->limit(1)->get();

        return $results[0] ?? null;
    }

    public function __clone()
    {
        parent::__clone();

        $this->searchClauses = clone $this->searchClauses;
    }

    protected function hasSearchClauses(): bool
    {
        return $this->searchClauses->isNotEmpty();
    }

    protected function addSearchClause(SearchWhereClause $clause): static
    {
        $this->searchClauses->push($clause);

        return $this;
    }

    protected function executeSearch(): array
    {
        return $this->executeRequest($this->createSearchRequest());
    }

    protected function createSearchRequest(): Request
    {
        $request = $this->createRequestWithParameters(
            requestClass: $this->searchRequestClass(),
            parameters: $this->searchRequestArguments(),
        );

        foreach ($this->searchRequestQueryParameters() as $key => $value) {
            $request->query()->add($key, $value);
        }

        return $request;
    }

    protected function searchRequestClass(): string
    {
        if (! is_string(static::SEARCH_REQUEST)) {
            throw new LogicException(static::class . ' does not define a search request.');
        }

        return static::SEARCH_REQUEST;
    }

    protected function searchRequestArguments(): array
    {
        return [
            'searchClauses' => $this->searchClausePayload(),
        ];
    }

    protected function searchRequestQueryParameters(): array
    {
        return array_filter([
            'order_by' => $this->getParameter('order_by'),
            'limit' => $this->getParameter('limit'),
            'offset' => $this->getParameter('offset'),
        ], static fn (mixed $value): bool => $value !== null);
    }

    protected function searchClausePayload(): array
    {
        $clauses = $this->searchClauses
            ->map(static fn (SearchWhereClause $clause): array => $clause->toArray())
            ->values()
            ->all();

        return $this->normalizeSearchClausePayload($clauses);
    }

    protected function normalizeSearchClausePayload(array $clauses): array
    {
        return $clauses;
    }
}
