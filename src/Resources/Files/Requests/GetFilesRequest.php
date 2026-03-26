<?php

declare(strict_types=1);

namespace Bexio\Resources\Files\Requests;

use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\File;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?FileArchivedState $archivedState = null,
        protected ?int $limit = null,
        protected int $offset = 0,
        protected ?string $orderBy = null,
    ) {
        if ($this->limit !== null && ($this->limit < 1 || $this->limit > 2000)) {
            throw new \InvalidArgumentException('Limit must be between 1 and 2000.');
        }

        if ($this->offset < 0) {
            throw new \InvalidArgumentException('Offset cannot be negative.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/files';
    }

    protected function defaultQuery(): array
    {
        $query = [
            'offset' => $this->offset,
        ];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->archivedState) {
            $query['archived_state'] = $this->archivedState->value;
        }

        if ($this->orderBy) {
            $query['order_by'] = $this->orderBy;
        }

        return $query;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return File::collect($response->json());
    }
}
