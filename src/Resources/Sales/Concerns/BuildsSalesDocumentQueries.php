<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use BackedEnum;
use Bexio\Support\Data\SearchCriteria;
use DateTimeInterface;
use InvalidArgumentException;

trait BuildsSalesDocumentQueries
{
    protected function whereSalesDocumentStatus(BackedEnum|int $status): static
    {
        return $this->where(
            'kb_item_status_id',
            SearchCriteria::EQUAL,
            $this->normalizeSalesDocumentStatus($status),
        );
    }

    protected function whereSalesDocumentStatusIn(array $statuses): static
    {
        $values = array_map(
            fn (BackedEnum|int $status): int => $this->normalizeSalesDocumentStatus($status),
            $statuses,
        );

        return $this->whereIn('kb_item_status_id', $values);
    }

    protected function whereSalesDocumentValidFrom(string|DateTimeInterface $date): static
    {
        return $this->where(
            $this->salesDocumentValidFromField(),
            SearchCriteria::GREATER_EQUAL,
            $this->formatSalesDocumentDate($date),
        );
    }

    protected function whereSalesDocumentValidTo(string|DateTimeInterface $date): static
    {
        return $this->where(
            $this->salesDocumentValidToField(),
            SearchCriteria::LESS_EQUAL,
            $this->formatSalesDocumentDate($date),
        );
    }

    protected function whereSalesDocumentValidBetween(
        string|DateTimeInterface $from,
        string|DateTimeInterface $to,
    ): static {
        return $this
            ->whereSalesDocumentValidFrom($from)
            ->whereSalesDocumentValidTo($to);
    }

    protected function salesDocumentValidFromField(): string
    {
        return 'is_valid_from';
    }

    protected function salesDocumentValidToField(): string
    {
        return 'is_valid_to';
    }

    protected function formatSalesDocumentDate(string|DateTimeInterface $date): string
    {
        return $date instanceof DateTimeInterface
            ? $date->format('Y-m-d')
            : $date;
    }

    private function normalizeSalesDocumentStatus(BackedEnum|int $status): int
    {
        $value = $status instanceof BackedEnum ? $status->value : $status;

        if (! is_int($value)) {
            throw new InvalidArgumentException('Sales document status must be an integer-backed enum or integer.');
        }

        return $value;
    }
}
