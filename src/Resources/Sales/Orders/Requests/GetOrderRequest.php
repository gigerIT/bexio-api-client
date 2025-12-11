<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Orders\Order;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetOrderRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Order
    {
        return Order::from($response->json());
    }
}

