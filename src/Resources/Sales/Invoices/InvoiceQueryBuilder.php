<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices;

use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Requests\SearchInvoicesRequest;
use Bexio\Support\Data\SearchCriteria;
use Bexio\Support\SearchableQueryBuilder;
use DateTimeInterface;

class InvoiceQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchInvoicesRequest::class;

    public function status(InvoiceStatus|int $status): static
    {
        $status = $status instanceof InvoiceStatus ? $status->value : $status;

        return $this->where('kb_item_status_id', SearchCriteria::EQUAL, $status);
    }

    public function statusIn(array $statuses): static
    {
        $values = array_map(
            static fn (InvoiceStatus|int $status): int => $status instanceof InvoiceStatus ? $status->value : $status,
            $statuses,
        );

        return $this->whereIn('kb_item_status_id', $values);
    }

    public function validFrom(string|DateTimeInterface $date): static
    {
        return $this->where('is_valid_from', SearchCriteria::GREATER_EQUAL, $this->formatDate($date));
    }

    public function validTo(string|DateTimeInterface $date): static
    {
        return $this->where('is_valid_to', SearchCriteria::LESS_EQUAL, $this->formatDate($date));
    }

    public function validBetween(string|DateTimeInterface $from, string|DateTimeInterface $to): static
    {
        return $this
            ->validFrom($from)
            ->validTo($to);
    }

    protected function formatDate(string|DateTimeInterface $date): string
    {
        return $date instanceof DateTimeInterface
            ? $date->format('Y-m-d')
            : $date;
    }
}
