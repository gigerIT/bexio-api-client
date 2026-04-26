<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Documents\Requests;

use Bexio\Resources\Payroll\Documents\PaystubPdf;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPaystubPdfRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $employeeId,
        protected readonly int $year,
        protected readonly int $month,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId}/paystub-pdf/{$this->year}/{$this->month}";
    }

    public function createDtoFromResponse(Response $response): PaystubPdf
    {
        return PaystubPdf::from($response->json());
    }
}
