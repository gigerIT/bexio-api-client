<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteManualEntryFileRequest extends Request
{
    protected Method $method = Method::DELETE;

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
}
