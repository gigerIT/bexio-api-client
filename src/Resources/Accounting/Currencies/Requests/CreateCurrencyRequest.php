<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Bexio\Resources\Accounting\Currencies\Currency;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCurrencyRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Currency $currency)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/currencies';
    }

    protected function defaultBody(): array
    {
        return $this->currency->toCreateApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Currency
    {
        return Currency::from($response->json());
    }
}
