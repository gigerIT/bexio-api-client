<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\PaymentTypes\Requests;

use Bexio\Resources\Other\PaymentTypes\PaymentType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPaymentTypesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/payment_type';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return PaymentType::collect($response->json());
    }
}

