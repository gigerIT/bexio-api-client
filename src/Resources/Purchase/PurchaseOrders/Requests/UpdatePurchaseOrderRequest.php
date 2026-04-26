<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders\Requests;

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePurchaseOrderRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(protected readonly PurchaseOrder $purchaseOrder)
    {
        if ($this->purchaseOrder->id === null) {
            throw new \InvalidArgumentException('id is required to update a purchase order.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/purchase_orders/{$this->purchaseOrder->id}";
    }

    protected function defaultBody(): array
    {
        return $this->purchaseOrder->toArray();
    }

    public function createDtoFromResponse(Response $response): PurchaseOrder
    {
        return PurchaseOrder::from($response->json());
    }
}
