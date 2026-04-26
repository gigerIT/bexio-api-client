<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasMultipartBody;

class UploadManualEntryFilesRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    /**
     * @param array<string, string> $files
     */
    public function __construct(
        protected readonly int|string $manualEntryId,
        protected readonly array $files,
        protected readonly int|string|null $entryId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        if ($this->entryId !== null) {
            return "/3.0/accounting/manual_entries/{$this->manualEntryId}/entries/{$this->entryId}/files";
        }

        return "/3.0/accounting/manual_entries/{$this->manualEntryId}/files";
    }

    protected function defaultBody(): array
    {
        return array_map(
            static fn (string $name, string $path): MultipartValue => new MultipartValue(
                name: $name,
                value: fopen($path, 'r') ?: '',
                filename: basename($path),
            ),
            array_keys($this->files),
            $this->files,
        );
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
