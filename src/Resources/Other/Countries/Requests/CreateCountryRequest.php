<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Countries\Requests;

use Bexio\Resources\Other\Countries\Country;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCountryRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Country $country)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/country';
    }

    protected function defaultBody(): array
    {
        return $this->country->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Country
    {
        return Country::from($response->json());
    }
}
