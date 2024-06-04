<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateBillRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Bill $bill)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/bills";
    }

    public function createDtoFromResponse(Response $response): Bill
    {
        return Bill::from($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->bill->toArray();
    }

}
