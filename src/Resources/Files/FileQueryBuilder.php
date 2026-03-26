<?php
declare(strict_types=1);

namespace Bexio\Resources\Files;

use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\Requests\SearchFilesRequest;
use Bexio\Support\SearchableQueryBuilder;

class FileQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchFilesRequest::class;

    /**
     * Filter by archived state.
     */
    public function archivedState(FileArchivedState $state): static
    {
        $this->setParameter('archived_state', $state);

        return $this;
    }

    protected function indexRequestArguments(): array
    {
        return [
            'archivedState' => $this->getParameter('archived_state'),
            'limit' => $this->getParameter('limit'),
            'offset' => $this->getParameter('offset', 0),
            'orderBy' => $this->getParameter('order_by'),
        ];
    }

    protected function searchRequestQueryParameters(): array
    {
        return array_filter([
            'archived_state' => $this->getParameter('archived_state')?->value,
            ...parent::searchRequestQueryParameters(),
        ], static fn (mixed $value): bool => $value !== null);
    }

    protected function normalizeSearchClausePayload(array $clauses): array
    {
        return array_map(static function (array $clause): array {
            if (($clause['field'] ?? null) === 'id' && is_numeric($clause['value'] ?? null)) {
                $clause['value'] = (int) $clause['value'];
            }

            return $clause;
        }, $clauses);
    }
}
