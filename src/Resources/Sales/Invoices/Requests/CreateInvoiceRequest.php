<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Invoice $invoice)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice";
    }

    protected function defaultBody(): array
    {
        return $this->invoice->toArray();
    }

    public function createDtoFromResponse(Response $response): Invoice
    {
        return Invoice::from($response->json());
    }

}
