<?php
declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\File;
use Bexio\Support\Requests\SearchRequest;
use InvalidArgumentException;
use Saloon\Http\Response;

class SearchFilesRequest extends SearchRequest
{
    public function __construct(
        array $searchClauses = [],
        protected readonly ?FileArchivedState $archivedState = null,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
        parent::__construct($searchClauses);

        if ($this->limit < 1 || $this->limit > 2000) {
            throw new InvalidArgumentException('Limit must be between 1 and 2000.');
        }

        if ($this->offset < 0) {
            throw new InvalidArgumentException('Offset cannot be negative.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/files/search';
    }

    protected function defaultQuery(): array
    {
        $query = [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];

        if ($this->archivedState) {
            $query['archived_state'] = $this->archivedState->value;
        }

        return $query;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return File::collect($response->json());
    }
}
