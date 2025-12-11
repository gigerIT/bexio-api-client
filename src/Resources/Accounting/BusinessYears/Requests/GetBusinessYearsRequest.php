<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\BusinessYears\Requests;

use Bexio\Resources\Accounting\BusinessYears\BusinessYear;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBusinessYearsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/business_years';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return BusinessYear::collect($response->json());
    }
}

