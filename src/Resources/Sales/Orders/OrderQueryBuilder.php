<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Sales\Orders\Enums\OrderStatus;
use Bexio\Resources\Sales\Orders\Requests\SearchOrdersRequest;
use Bexio\Resources\Sales\Concerns\BuildsSalesDocumentQueries;
use Bexio\Support\SearchableQueryBuilder;
use DateTimeInterface;

class OrderQueryBuilder extends SearchableQueryBuilder
{
    use BuildsSalesDocumentQueries;

    protected const SEARCH_REQUEST = SearchOrdersRequest::class;

    public function status(OrderStatus|int $status): static
    {
        return $this->whereSalesDocumentStatus($status);
    }

    public function statusIn(array $statuses): static
    {
        return $this->whereSalesDocumentStatusIn($statuses);
    }

    public function validFrom(string|DateTimeInterface $date): static
    {
        return $this->whereSalesDocumentValidFrom($date);
    }

    public function validTo(string|DateTimeInterface $date): static
    {
        return $this->whereSalesDocumentValidTo($date);
    }

    public function validBetween(string|DateTimeInterface $from, string|DateTimeInterface $to): static
    {
        return $this->whereSalesDocumentValidBetween($from, $to);
    }
}
