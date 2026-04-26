<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders\Requests;

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPurchaseOrderRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $purchaseOrderId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/purchase_orders/{$this->purchaseOrderId}";
    }

    public function createDtoFromResponse(Response $response): PurchaseOrder
    {
        return PurchaseOrder::from($response->json());
    }
}
