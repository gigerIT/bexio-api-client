<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\StockAreas\Requests;

use Bexio\Resources\Items\StockAreas\StockArea;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchStockAreasRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/stock_place/search';
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return StockArea::collect($response->json());
    }
}



