<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteManualEntryRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int|string $manualEntryId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/manual_entries/{$this->manualEntryId}";
    }
}
