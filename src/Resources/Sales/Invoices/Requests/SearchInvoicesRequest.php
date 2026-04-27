<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchInvoicesRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/kb_invoice/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Invoice::collectFromApiPayload($response->json());
    }
}
