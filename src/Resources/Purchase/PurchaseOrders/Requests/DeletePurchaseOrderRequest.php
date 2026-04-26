<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeletePurchaseOrderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $purchaseOrderId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/purchase_orders/{$this->purchaseOrderId}";
    }
}
