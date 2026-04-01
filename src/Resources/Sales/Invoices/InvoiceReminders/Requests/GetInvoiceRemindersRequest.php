<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoiceRemindersRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $invoiceId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/kb_reminder";
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = array_map(function (array $item): array {
            $item['kb_invoice_id'] ??= $this->invoiceId;

            return $item;
        }, $response->json());

        return InvoiceReminder::collect($data);
    }
}
