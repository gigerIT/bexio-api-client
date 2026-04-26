<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Employees\Requests;

use Bexio\Resources\Payroll\Employees\Employee;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateEmployeeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Employee $employee)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/payroll/employees';
    }

    protected function defaultBody(): array
    {
        return $this->employee->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Employee
    {
        return Employee::from($response->json());
    }
}
