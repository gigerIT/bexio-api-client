<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Currencies\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCurrencyRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $currencyId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/currencies/{$this->currencyId}";
    }
}
