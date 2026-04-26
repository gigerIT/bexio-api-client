<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Orders\OrderRepetition;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateOrderRepetitionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int $orderId,
        protected readonly OrderRepetition $repetition,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->orderId}/repetition";
    }

    protected function defaultBody(): array
    {
        return $this->repetition->toPayload();
    }

    public function createDtoFromResponse(Response $response): OrderRepetition
    {
        return OrderRepetition::fromApiPayload($response->json());
    }
}
