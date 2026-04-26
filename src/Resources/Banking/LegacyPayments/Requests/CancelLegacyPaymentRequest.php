<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\LegacyPayments\Requests;

use Bexio\Resources\Banking\LegacyPayments\LegacyPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class CancelLegacyPaymentRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected readonly string $paymentId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/payments/{$this->paymentId}/cancel";
    }

    public function createDtoFromResponse(Response $response): LegacyPayment
    {
        return LegacyPayment::from($response->json());
    }
}
