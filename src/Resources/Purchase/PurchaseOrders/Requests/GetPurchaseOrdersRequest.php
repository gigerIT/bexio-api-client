<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders\Requests;

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPurchaseOrdersRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $orderBy = null,
        protected ?int $limit = null,
        protected int $offset = 0,
    ) {
        if ($this->limit !== null && ($this->limit < 1 || $this->limit > 2000)) {
            throw new \InvalidArgumentException('Limit must be between 1 and 2000.');
        }

        if ($this->offset < 0) {
            throw new \InvalidArgumentException('Offset cannot be negative.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/purchase_orders';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'order_by' => $this->orderBy,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return PurchaseOrder::collect($response->json());
    }
}
