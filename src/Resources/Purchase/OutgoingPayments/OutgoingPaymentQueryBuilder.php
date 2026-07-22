<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments;

use Bexio\Resources\Purchase\Concerns\BuildsPageBasedListQueries;
use Bexio\Support\QueryBuilder;

class OutgoingPaymentQueryBuilder extends QueryBuilder
{
    use BuildsPageBasedListQueries;

    public function forBill(string $billId): static
    {
        return $this->setParameter('bill_id', $billId);
    }

    protected function additionalIndexQueryParameters(): array
    {
        return [
            'bill_id' => $this->getParameter('bill_id'),
        ];
    }
}
