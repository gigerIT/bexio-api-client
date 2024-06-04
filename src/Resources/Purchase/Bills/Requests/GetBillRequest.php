<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBillRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/bills/$this->id";
    }

    public function createDtoFromResponse(Response $response): Bill
    {
        return Bill::from($response->json());
    }

}
