<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class MarkInvoiceAsSentRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected readonly int $invoiceId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/mark_as_sent";
    }
}
