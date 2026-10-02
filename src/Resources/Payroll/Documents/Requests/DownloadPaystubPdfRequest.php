<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Documents\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DownloadPaystubPdfRequest extends Request
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
        return "/4.0/payroll/employees/{$this->employeeId}/paystub-pdf-download/{$this->year}/{$this->month}";
    }
}
