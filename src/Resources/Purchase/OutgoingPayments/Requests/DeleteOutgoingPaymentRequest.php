<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteOutgoingPaymentRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly string $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/outgoing-payments/{$this->id}";
    }
}

