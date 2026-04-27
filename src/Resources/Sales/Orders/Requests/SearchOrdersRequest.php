<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Orders\Order;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchOrdersRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/kb_order/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Order::collect($response->json());
    }
}
