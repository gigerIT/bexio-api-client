<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Bexio\Resources\Accounting\Currencies\Currency;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCurrenciesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly ?int $limit = null,
        protected readonly int $offset = 0,
        protected readonly ?string $embed = null,
        protected readonly ?string $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/currencies';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'offset' => $this->offset,
            'embed' => $this->embed,
            'date' => $this->date,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Currency::collect($response->json());
    }
}
