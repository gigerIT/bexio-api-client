<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders;

use Bexio\BexioClient;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\SearchInvoiceRemindersRequest;
use Bexio\Support\SearchableQueryBuilder;
use LogicException;

class InvoiceReminderQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchInvoiceRemindersRequest::class;

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
        ];
    }

    protected function searchRequestArguments(): array
    {
        return [
            'invoiceId' => $this->requireInvoiceId(),
            'searchClauses' => $this->searchClausePayload(),
        ];
    }

    protected function searchRequestQueryParameters(): array
    {
        return [];
    }

    private function requireInvoiceId(): int
    {
        if ($this->invoiceId === null) {
            throw new LogicException('Invoice reminder queries require an invoice id. Call forInvoice() first.');
        }

        return $this->invoiceId;
    }
}
