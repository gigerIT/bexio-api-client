<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Requests\SearchQuotesRequest;
use Bexio\Resources\Sales\Concerns\BuildsSalesDocumentQueries;
use Bexio\Support\SearchableQueryBuilder;
use DateTimeInterface;

class QuoteQueryBuilder extends SearchableQueryBuilder
{
    use BuildsSalesDocumentQueries;

    protected const SEARCH_REQUEST = SearchQuotesRequest::class;

    public function status(QuoteStatus|int $status): static
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

    protected function salesDocumentValidToField(): string
    {
        return 'is_valid_until';
    }
}
