<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests;

use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchInvoiceRemindersRequest extends SearchRequest
{
    public function __construct(
        protected readonly int $invoiceId,
        array $searchClauses = [],
    ) {
        parent::__construct($searchClauses);
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/kb_reminder/search";
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
