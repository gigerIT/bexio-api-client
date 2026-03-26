<?php

declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments\Requests;

use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetOutgoingPaymentsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/4.0/purchase/outgoing-payments';
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json('data') ?? [];

        return OutgoingPayment::collect($data);
    }
}
