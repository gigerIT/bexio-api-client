<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\BusinessYears\Requests;

use Bexio\Resources\Accounting\BusinessYears\BusinessYear;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBusinessYearRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $uuid)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/business_years/{$this->uuid}";
    }

    public function createDtoFromResponse(Response $response): BusinessYear
    {
        return BusinessYear::from($response->json());
    }
}

