<?php

declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\File;
use InvalidArgumentException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchFilesRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly array $searchClauses = [],
        protected readonly ?FileArchivedState $archivedState = null,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
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

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return File::collect($response->json());
    }
}
