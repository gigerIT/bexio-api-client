<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Bexio\Resources\Accounting\Currencies\Currency;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCurrencyRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $currencyId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/currencies/{$this->currencyId}";
    }

    public function createDtoFromResponse(Response $response): Currency
    {
        return Currency::from($response->json());
    }
}
