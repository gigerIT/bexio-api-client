<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetNextManualEntryReferenceNumberRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/manual_entries/next_ref_nr';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
