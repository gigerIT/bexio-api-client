<?php

declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteOrderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->id}";
    }
}
