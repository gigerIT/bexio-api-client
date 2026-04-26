<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Bexio\Resources\Accounting\Currencies\Currency;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCurrencyRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected readonly Currency $currency)
    {
        if ($this->currency->id === null) {
            throw new \InvalidArgumentException('id is required to update a currency.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/currencies/{$this->currency->id}";
    }

    protected function defaultBody(): array
    {
        return $this->currency->toUpdateApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Currency
    {
        return Currency::from($response->json());
    }
}
