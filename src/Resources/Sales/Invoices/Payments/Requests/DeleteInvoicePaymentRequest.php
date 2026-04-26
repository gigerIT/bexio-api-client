<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteInvoicePaymentRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly int $paymentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/payment/{$this->paymentId}";
    }
}
