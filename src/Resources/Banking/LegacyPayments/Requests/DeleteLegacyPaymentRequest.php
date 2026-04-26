<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\LegacyPayments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteLegacyPaymentRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int|string $paymentId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/payments/{$this->paymentId}";
    }
}
