<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class DuplicateBillRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected string $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/bills/{$this->id}/actions";
    }

    public function createDtoFromResponse(Response $response): Bill
    {
        return Bill::from($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'action' => 'DUPLICATE',
        ];
    }

}
