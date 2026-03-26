<?php

declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Orders\Order;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateOrderRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Order $order) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/kb_order';
    }

    protected function defaultBody(): array
    {
        return $this->order->toArray();
    }

    public function createDtoFromResponse(Response $response): Order
    {
        return Order::from($response->json());
    }
}
