<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockLocations\Requests;

use Bexio\Resources\Items\StockLocations\StockLocation;
use InvalidArgumentException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetStockLocationsRequest extends Request
{
    public const LIMIT_MAX = 2000;

    protected Method $method = Method::GET;

    public function __construct(
        protected string $order_by = 'id',
        protected int $limit = 500,
        protected int $offset = 0,
    ) {
        if ($limit > self::LIMIT_MAX) {
            throw new InvalidArgumentException('Limit cannot be greater than ' . self::LIMIT_MAX);
        }

        if ($offset < 0) {
            throw new InvalidArgumentException('Offset cannot be less than 0');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/stock';
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
        return StockLocation::collect($response->json());
    }
}


