<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetManualEntryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $uuid)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/manual_entries/{$this->uuid}";
    }

    public function createDtoFromResponse(Response $response): ManualEntry
    {
        return ManualEntry::from($response->json());
    }
}

