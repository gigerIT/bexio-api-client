<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchInvoiceRemindersRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly array $searchClauses = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/kb_reminder/search";
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
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
