<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments\Requests;

use Bexio\Resources\Banking\Payments\Payment;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(protected readonly Payment $payment)
    {
        if ($this->payment->uuid === null) {
            throw new \InvalidArgumentException('uuid is required to update a payment.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/banking/payments/{$this->payment->uuid}";
    }

    protected function defaultBody(): array
    {
        return $this->payment->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Payment
    {
        $data = $response->json('data') ?? $response->json();

        return Payment::from($data);
    }
}
