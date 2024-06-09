<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBillsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct()
    {

    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/bills";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Bill::collect($response->json()['data']);
    }

}
