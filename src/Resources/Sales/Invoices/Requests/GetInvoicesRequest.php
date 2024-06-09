<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {

    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Invoice::collect($response->json());
    }

}
