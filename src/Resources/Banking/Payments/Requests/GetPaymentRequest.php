<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments\Requests;

use Bexio\Resources\Banking\Payments\Payment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $paymentId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/banking/payments/{$this->paymentId}";
    }

    public function createDtoFromResponse(Response $response): Payment
    {
        $data = $response->json('data') ?? $response->json();
        return Payment::from($data);
    }
}


