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
        if ($this->payment->id === null) {
            throw new \InvalidArgumentException('id is required to update an outgoing payment.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/purchase/outgoing-payments';
    }

    protected function defaultBody(): array
    {
        return $this->payment->toUpdateApi();
    }

    public function createDtoFromResponse(Response $response): OutgoingPayment
    {
        $data = $response->json('data') ?? $response->json();
        return OutgoingPayment::from($data);
    }
}

