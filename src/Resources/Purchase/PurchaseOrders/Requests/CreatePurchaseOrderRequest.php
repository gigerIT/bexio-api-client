<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\PurchaseOrders\Requests;

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePurchaseOrderRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected PurchaseOrder $purchaseOrder)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/3.0/purchase_orders";
    }

    public function createDtoFromResponse(Response $response): PurchaseOrder
    {
        return PurchaseOrder::from($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->purchaseOrder->toArray();
    }

}
