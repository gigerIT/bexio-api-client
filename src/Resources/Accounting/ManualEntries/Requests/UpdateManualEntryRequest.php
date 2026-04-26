<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateManualEntryRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(protected readonly ManualEntry $manualEntry)
    {
        if ($this->manualEntry->id === null) {
            throw new \InvalidArgumentException('id is required to update a manual entry.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/manual_entries/{$this->manualEntry->id}";
    }

    protected function defaultBody(): array
    {
        return $this->manualEntry->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): ManualEntry
    {
        return ManualEntry::from($response->json());
    }
}
