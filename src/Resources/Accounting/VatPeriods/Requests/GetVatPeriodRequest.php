<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\VatPeriods\Requests;

use Bexio\Resources\Accounting\VatPeriods\VatPeriod;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetVatPeriodRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/accounting/vat_periods/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): VatPeriod
    {
        return VatPeriod::from($response->json());
    }
}

