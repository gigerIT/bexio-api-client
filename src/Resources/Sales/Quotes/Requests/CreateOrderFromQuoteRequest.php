<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\DocumentConversionPosition;
use Bexio\Resources\Sales\DocumentConversionPayload;
use Bexio\Resources\Sales\Orders\Order;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasStringBody;

class CreateOrderFromQuoteRequest extends Request implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;

    /**
     * @param array<int, DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function __construct(
        readonly protected int $quoteId,
        readonly protected ?array $positions = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->quoteId}/order";
    }

    protected function defaultHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    protected function defaultBody(): string
    {
        return DocumentConversionPayload::fromPositions($this->positions);
    }

    public function createDtoFromResponse(Response $response): Order
    {
        return Order::from($response->json());
    }
}
