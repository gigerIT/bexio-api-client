<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Taxes\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteTaxRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(public readonly int $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/3.0/taxes/$this->id";
    }
}
