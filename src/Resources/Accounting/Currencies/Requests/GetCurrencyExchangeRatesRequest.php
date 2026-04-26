<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCurrencyExchangeRatesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $currencyId,
        protected readonly ?string $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/currencies/{$this->currencyId}/exchange_rates";
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
