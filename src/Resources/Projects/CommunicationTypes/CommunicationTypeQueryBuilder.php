<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes;

use Bexio\Resources\Projects\CommunicationTypes\Requests\GetCommunicationTypesRequest;
use Bexio\Resources\Projects\CommunicationTypes\Requests\SearchCommunicationTypesRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\QueryBuilder;
use Illuminate\Support\Collection;
use RuntimeException;

class CommunicationTypeQueryBuilder extends QueryBuilder
{
    private Collection $searchClauses;

    public function where(string $field, SearchCriteria $operator, string $value): static
    {
        if (!isset($this->searchClauses)) {
            $this->searchClauses = new Collection();
        }

        $this->searchClauses->push(new CommunicationTypeSearchWhereClause($field, $operator, $value));

        return $this;
    }

    public function search(): array
    {
        if (!isset($this->searchClauses) || $this->searchClauses->isEmpty()) {
            return [];
        }

        $clauses = $this->searchClauses->toArray();

        $request = new SearchCommunicationTypesRequest($clauses);
        $response = $this->client->send($request);

        if (!$response->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $response->json());
        }

        $results = $request->createDtoFromResponse($response);

        if (!empty($results)) {
            return $results;
        }

        // Fallback: fetch all and filter locally when the API search returns no results.
        $fallbackRequest = new GetCommunicationTypesRequest();
        $fallbackResponse = $this->client->send($fallbackRequest);

        if (!$fallbackResponse->successful()) {
            throw new RuntimeException("Failed to fetch resources: " . $fallbackResponse->json());
        }

        $types = $fallbackRequest->createDtoFromResponse($fallbackResponse);

        $filtered = array_filter($types, function ($type) use ($clauses) {
            foreach ($clauses as $clause) {
                $field = $clause['field'] ?? null;

                if (!$field || !isset($type->{$field})) {
                    return false;
                }

                $criteria = $clause['criteria'] ?? SearchCriteria::LIKE->value;
                $value = (string)($clause['value'] ?? '');

                $criteriaValue = $criteria instanceof SearchCriteria ? $criteria->value : (string)$criteria;
                $fieldValue = (string)$type->{$field};

                $matches = match ($criteriaValue) {
                    SearchCriteria::EQUAL->value => $fieldValue === $value,
                    SearchCriteria::LIKE->value => stripos($fieldValue, $value) !== false,
                    default => false,
                };

                if (!$matches) {
                    return false;
                }
            }

            return true;
        });

        return array_values($filtered);
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

