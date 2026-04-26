<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\DocumentCopyPayload;
use Bexio\Resources\Sales\Invoices\Invoice;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CopyInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly DocumentCopyPayload|array $payload = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/copy";
    }

    protected function defaultBody(): array
    {
        if ($this->payload instanceof DocumentCopyPayload) {
            return $this->payload->toPayload();
        }

        return $this->payload;
    }

    public function createDtoFromResponse(Response $response): Invoice
    {
        return Invoice::createFromApiPayload($response->json());
    }
}
