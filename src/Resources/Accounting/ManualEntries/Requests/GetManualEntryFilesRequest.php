<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntryFile;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetManualEntryFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $manualEntryId,
        protected readonly int|string|null $entryId = null,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        if ($this->entryId !== null) {
            return "/3.0/accounting/manual_entries/{$this->manualEntryId}/entries/{$this->entryId}/files";
        }

        return "/3.0/accounting/manual_entries/{$this->manualEntryId}/files";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ManualEntryFile::collect($response->json());
    }
}
