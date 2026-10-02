<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments\Requests;

use Bexio\Resources\Banking\Payments\Payment;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Payment $payment)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/banking/payments';
    }

    protected function defaultBody(): array
    {
        $payload = $this->payment->toApi()->toArray();
        if (is_string($payload['amount'] ?? null)) {
            $payload['amount'] = (float) $payload['amount'];
        }

        return $payload;
    }

    public function createDtoFromResponse(Response $response): Payment
    {
        $data = $response->json('data') ?? $response->json();
        return Payment::from($data);
    }
}


