<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Support\QueryBuilder;
use InvalidArgumentException;

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

    public function limit(int $limit): static
    {
        if ($limit < 1) {
            throw new InvalidArgumentException('Limit must be greater than 0.');
        }

        return $this->perPage($limit);
    }

    public function offset(int $offset): static
    {
        throw new InvalidArgumentException(
            'Payments use page-based pagination. Use page() or forPage() instead of offset().'
        );
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        throw new InvalidArgumentException('Payments API does not support orderBy().');
    }

    public function forPage(int $page, int $perPage = 15): static
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page must be greater than 0.');
        }

        if ($perPage < 1) {
            throw new InvalidArgumentException('Per-page value must be greater than 0.');
        }

        return $this
            ->page($page - 1)
            ->perPage($perPage);
    }

    public function first(): mixed
    {
        $results = (clone $this)
            ->forPage(1, 1)
            ->get();

        return $results[0] ?? null;
    }

    protected function indexRequestArguments(): array
    {
        return array_filter([
            'filterBy' => $this->getParameter('filterBy'),
            'page' => $this->getParameter('page'),
            'perPage' => $this->getParameter('perPage'),
        ], static fn (mixed $value): bool => $value !== null);
    }
}
