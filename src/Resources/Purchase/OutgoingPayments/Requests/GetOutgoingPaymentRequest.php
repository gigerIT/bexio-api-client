<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments\Requests;

use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetOutgoingPaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/purchase/outgoing-payments/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): OutgoingPayment
    {
        $data = $response->json('data') ?? $response->json();
        return OutgoingPayment::from($data);
    }
}

