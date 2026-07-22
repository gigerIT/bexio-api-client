<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Taxes;

use Bexio\Support\QueryBuilder;

class TaxQueryBuilder extends QueryBuilder
{
    /**
     * Filter taxes by active/inactive scope. Pass null to include both.
     */
    public function scope(?string $scope): static
    {
        return $this->setParameter('scope', $scope);
    }

    /**
     * Include inactive taxes by clearing the default active scope filter.
     */
    public function withInactive(): static
    {
        return $this->scope(null);
    }

    /**
     * Filter taxes active on the given date (YYYY-MM-DD).
     */
    public function date(string $date): static
    {
        return $this->setParameter('date', $date);
    }

    /**
     * Filter by tax type (sales_tax or pre_tax).
     */
    public function types(string $types): static
    {
        return $this->setParameter('types', $types);
    }
}
