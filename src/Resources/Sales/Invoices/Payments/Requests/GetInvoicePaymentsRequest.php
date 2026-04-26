<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments\Requests;

use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoicePaymentsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $invoiceId,
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice/{$this->invoiceId}/payment";
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return InvoicePayment::collect($this->withInvoiceId($response->json()));
    }

    private function withInvoiceId(array $payments): array
    {
        return array_map(function (array $payment): array {
            $payment['kb_invoice_id'] = $this->invoiceId;

            return $payment;
        }, $payments);
    }
}
