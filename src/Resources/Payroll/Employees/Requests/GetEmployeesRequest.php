<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Employees\Requests;

use Bexio\Resources\Payroll\Employees\Employee;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetEmployeesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/4.0/payroll/employees';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Employee::collect($response->json('data') ?? []);
    }
}
