<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeletePaymentRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly string $paymentId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/banking/payments/{$this->paymentId}";
    }
}



