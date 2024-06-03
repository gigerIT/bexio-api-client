<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Taxes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaxesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/3.0/taxes";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Tax::collect($response->json());
    }

    public function withInactive(): self
    {
        $this->query()->add('scope', null);
        return $this;
    }

    protected function defaultQuery(): array
    {
        return [
            'scope' => 'active',
            'types' => 'sales_tax'
        ];
    }
}
