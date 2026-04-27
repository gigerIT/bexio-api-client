<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\PaymentTypes\Requests;

use Bexio\Resources\Other\PaymentTypes\PaymentType;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchPaymentTypeRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/payment_type/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return PaymentType::collect($response->json());
    }
}
