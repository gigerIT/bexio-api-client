<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Support\QueryBuilder;

class PaymentQueryBuilder extends QueryBuilder
{
    public function filterBy(string $filter): static
    {
        $this->setParameter('filterBy', $filter);
        return $this;
    }

    public function page(int $page): static
    {
        $this->setParameter('page', $page);
        return $this;
    }

    public function perPage(int $perPage): static
    {
        $this->setParameter('perPage', $perPage);
        return $this;
    }
}


