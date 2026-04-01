<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteInvoiceReminderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly int $reminderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/kb_reminder/{$this->reminderId}";
    }
}
