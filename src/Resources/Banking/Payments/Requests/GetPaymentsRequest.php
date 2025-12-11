<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments\Requests;

use Bexio\Resources\Banking\Payments\Payment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPaymentsRequest extends Request
{
    private const PER_PAGE_MAX = 2000;

    protected Method $method = Method::GET;

    public function __construct(
        public ?string $filterBy = null,
        public int $page = 0,
        public int $perPage = 500,
    ) {
        if ($perPage > self::PER_PAGE_MAX) {
            throw new \InvalidArgumentException("perPage cannot be greater than " . self::PER_PAGE_MAX);
        }

        if ($page < 0) {
            throw new \InvalidArgumentException("page cannot be less than 0");
        }
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/banking/payments';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'filter-by' => $this->filterBy,
            'page' => $this->page,
            'per-page' => $this->perPage,
        ], static fn($value) => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json('data') ?? $response->json();
        return Payment::collect($data);
    }
}


