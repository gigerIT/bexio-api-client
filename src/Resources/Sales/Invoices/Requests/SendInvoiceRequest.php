<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Email\Email;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SendInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly Email $email,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/send";
    }

    protected function defaultBody(): array
    {
        return $this->email->toDocumentPayload();
    }
}
