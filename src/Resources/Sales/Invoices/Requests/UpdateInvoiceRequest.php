<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Invoice $invoice)
    {
        if ($this->invoice->id === null) {
            throw new \InvalidArgumentException('id is required to update an invoice.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoice->id}";
    }

    protected function defaultBody(): array
    {
        return $this->invoice->toUpdateApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Invoice
    {
        return Invoice::createFromApiPayload($response->json());
    }
}
