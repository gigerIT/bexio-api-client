<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Deliveries\Requests;

use Bexio\Resources\Sales\Deliveries\Delivery;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetDeliveriesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/kb_delivery';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Delivery::collect($response->json());
    }
}

