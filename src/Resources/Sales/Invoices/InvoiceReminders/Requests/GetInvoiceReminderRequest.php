<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoiceReminderRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly int $reminderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/kb_reminder/{$this->reminderId}";
    }

    public function createDtoFromResponse(Response $response): InvoiceReminder
    {
        $data = $response->json();
        $data['kb_invoice_id'] ??= $this->invoiceId;

        return InvoiceReminder::from($data);
    }
}
