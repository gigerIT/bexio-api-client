<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments;

use Bexio\BexioClient;
use Bexio\Support\QueryBuilder;
use LogicException;

class InvoicePaymentQueryBuilder extends QueryBuilder
{
    private ?int $invoiceId = null;

    public function __construct(string $resourceClass, BexioClient $client, ?int $invoiceId = null)
    {
        parent::__construct($resourceClass, $client);

        $this->invoiceId = $invoiceId;
    }

    public function forInvoice(int $invoiceId): static
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    protected function indexRequestArguments(): array
    {
        return [
            'invoiceId' => $this->requireInvoiceId(),
            'limit' => $this->getParameter('limit', 500),
            'offset' => $this->getParameter('offset', 0),
        ];
    }

    private function requireInvoiceId(): int
    {
        if ($this->invoiceId === null) {
            throw new LogicException('Invoice payment queries require an invoice id. Call forInvoice() first.');
        }

        return $this->invoiceId;
    }
}
