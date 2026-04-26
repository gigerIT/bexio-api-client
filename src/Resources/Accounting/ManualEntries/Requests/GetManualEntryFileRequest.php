<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntryFile;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetManualEntryFileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $manualEntryId,
        protected readonly int|string $fileId,
        protected readonly int|string|null $entryId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        if ($this->entryId !== null) {
            return "/3.0/accounting/manual_entries/{$this->manualEntryId}/entries/{$this->entryId}/files/{$this->fileId}";
        }

        return "/3.0/accounting/manual_entries/{$this->manualEntryId}/files/{$this->fileId}";
    }

    public function createDtoFromResponse(Response $response): ManualEntryFile
    {
        return ManualEntryFile::from($response->json());
    }
}
