<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments\Requests;

use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateOutgoingPaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(readonly protected OutgoingPayment $payment)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/outgoing-payments/{$this->payment->id}";
    }

    protected function defaultBody(): array
    {
        return $this->payment->toArray();
    }

    public function createDtoFromResponse(Response $response): OutgoingPayment
    {
        $data = $response->json('data') ?? $response->json();
        return OutgoingPayment::from($data);
    }
}

