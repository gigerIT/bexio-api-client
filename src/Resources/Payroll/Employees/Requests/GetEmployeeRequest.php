<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Employees\Requests;

use Bexio\Resources\Payroll\Employees\Employee;
use Carbon\CarbonImmutable;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetEmployeeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $employeeId,
        protected readonly ?string $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId}";
    }

    protected function defaultQuery(): array
    {
        return [
            'date' => $this->date ?? CarbonImmutable::now()->toDateString(),
        ];
    }

    public function createDtoFromResponse(Response $response): Employee
    {
        return Employee::from($response->json());
    }
}
