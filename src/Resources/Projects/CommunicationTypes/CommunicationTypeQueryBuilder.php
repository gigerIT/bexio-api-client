<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes;

use Bexio\Resources\Projects\CommunicationTypes\Requests\GetCommunicationTypesRequest;
use Bexio\Resources\Projects\CommunicationTypes\Requests\SearchCommunicationTypesRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\SearchableQueryBuilder;

class CommunicationTypeQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchCommunicationTypesRequest::class;

    protected function executeSearch(): array
    {
        $results = parent::executeSearch();

        if (! empty($results)) {
            return $results;
        }

        $types = $this->executeRequest(new GetCommunicationTypesRequest());

        $filtered = array_values(array_filter($types, fn (CommunicationType $type): bool => $this->matchesAllClauses($type)));

        $offset = $this->getParameter('offset', 0);
        $limit = $this->getParameter('limit');

        return $limit === null
            ? array_slice($filtered, $offset)
            : array_slice($filtered, $offset, $limit);
    }

    private function matchesAllClauses(CommunicationType $type): bool
    {
        foreach ($this->searchClausePayload() as $clause) {
            $field = $clause['field'] ?? null;

            if (! is_string($field) || ! isset($type->{$field})) {
                return false;
            }

            $criteria = $clause['criteria'] ?? SearchCriteria::LIKE;
            $criteria = $criteria instanceof SearchCriteria ? $criteria : SearchCriteria::from($criteria);
            $expected = (string) ($clause['value'] ?? '');
            $actual = (string) $type->{$field};

            $matches = match ($criteria) {
                SearchCriteria::EQUAL => $actual === $expected,
                SearchCriteria::LIKE => stripos($actual, $expected) !== false,
                default => false,
            };

            if (! $matches) {
                return false;
            }
        }

        return true;
    }
}
