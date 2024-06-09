<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteBillRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(public readonly string $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/bills/$this->id";
    }
}
