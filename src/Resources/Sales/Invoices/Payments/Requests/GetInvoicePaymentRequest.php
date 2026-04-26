<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments\Requests;

use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoicePaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly int $paymentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/payment/{$this->paymentId}";
    }

    public function createDtoFromResponse(Response $response): InvoicePayment
    {
        $payload = $response->json();
        $payload['kb_invoice_id'] = $this->invoiceId;

        return InvoicePayment::from($payload);
    }
}
