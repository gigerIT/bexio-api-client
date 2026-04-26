<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Orders\OrderRepetition;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetOrderRepetitionRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $orderId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->orderId}/repetition";
    }

    public function createDtoFromResponse(Response $response): OrderRepetition
    {
        return OrderRepetition::fromApiPayload($response->json());
    }
}
