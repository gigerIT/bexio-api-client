<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoiceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Invoice
    {
        return Invoice::from($response->json());
    }

}
