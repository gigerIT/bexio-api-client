<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Countries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCountryRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $countryId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/country/{$this->countryId}";
    }
}
