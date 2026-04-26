<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\DocumentConversionPayload;
use Bexio\Resources\Sales\DocumentConversionPosition;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasStringBody;

class CreateDeliveryFromOrderRequest extends Request implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;

    /**
     * @param array<int, DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function __construct(
        readonly protected int $orderId,
        readonly protected ?array $positions = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->orderId}/delivery";
    }

    protected function defaultHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    protected function defaultBody(): string
    {
        return DocumentConversionPayload::fromPositions($this->positions);
    }

    public function createDtoFromResponse(Response $response): Delivery
    {
        return Delivery::from($response->json());
    }
}
