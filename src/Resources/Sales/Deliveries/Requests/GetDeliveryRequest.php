<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Deliveries\Requests;

use Bexio\Resources\Sales\Deliveries\Delivery;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetDeliveryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_delivery/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Delivery
    {
        return Delivery::from($response->json());
    }
}

