<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Sales\Invoices\Invoice;
use InvalidArgumentException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetInvoicesRequest extends Request
{
    private const LIMIT_MAX = 2000;

    protected Method $method = Method::GET;

    public function __construct(
        protected string $order_by = 'id',
        protected int $limit = 500,
        protected int $offset = 0,
    ) {
        if ($this->limit < 1 || $this->limit > self::LIMIT_MAX) {
            throw new InvalidArgumentException('Limit must be between 1 and ' . self::LIMIT_MAX . '.');
        }

        if ($this->offset < 0) {
            throw new InvalidArgumentException('Offset cannot be negative.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice";
    }

    protected function defaultQuery(): array
    {
        return [
            'order_by' => $this->order_by,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Invoice::collectFromApiPayload($response->json());
    }

}
