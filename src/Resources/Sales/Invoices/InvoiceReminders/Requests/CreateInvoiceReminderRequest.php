<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class CreateInvoiceReminderRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected readonly InvoiceReminder $reminder)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->requireInvoiceId()}/kb_reminder";
    }

    public function createDtoFromResponse(Response $response): InvoiceReminder
    {
        $data = $response->json();
        $data['kb_invoice_id'] ??= $this->requireInvoiceId();

        return InvoiceReminder::from($data);
    }

    private function requireInvoiceId(): int
    {
        if (! $this->reminder->kb_invoice_id) {
            throw new \RuntimeException('kb_invoice_id is required to create an InvoiceReminder');
        }

        return $this->reminder->kb_invoice_id;
    }
}
