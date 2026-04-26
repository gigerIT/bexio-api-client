<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteOrderRepetitionRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $orderId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_order/{$this->orderId}/repetition";
    }
}
