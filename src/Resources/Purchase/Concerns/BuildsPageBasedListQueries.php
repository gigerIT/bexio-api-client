<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Concerns;

use InvalidArgumentException;

trait BuildsPageBasedListQueries
{
    public function page(int $page): static
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page must be greater than 0.');
        }

        return $this->setParameter('page', $page);
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
            ->page($page)
            ->limit($perPage);
    }

    public function offset(int $offset): static
    {
        throw new InvalidArgumentException(
            'This endpoint uses page-based pagination. Use page() or forPage() instead of offset().'
        );
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Order direction must be asc or desc.');
        }

        return $this
            ->setParameter('sort', $field)
            ->setParameter('order', $direction);
    }

    protected function indexRequestArguments(): array
    {
        return array_filter([
            ...$this->additionalIndexQueryParameters(),
            'limit' => $this->getParameter('limit'),
            'page' => $this->getParameter('page'),
            'order' => $this->getParameter('order'),
            'sort' => $this->getParameter('sort'),
        ], static fn (mixed $value): bool => $value !== null);
    }

    /**
     * @return array<string, mixed>
     */
    protected function additionalIndexQueryParameters(): array
    {
        return [];
    }
}
