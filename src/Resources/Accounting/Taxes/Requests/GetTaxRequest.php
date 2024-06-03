<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Taxes\Requests;

use Bexio\Resources\Accounting\Taxes\Tax;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaxRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public readonly int $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/3.0/taxes/$this->id";
    }

    public function createDtoFromResponse(Response $response): Tax
    {
        return Tax::from($response->json());
    }

}
