<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Absences\Requests;

use Bexio\Resources\Payroll\Absences\Absence;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAbsenceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $employeeId,
        protected readonly int|string $absenceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId}/absences/{$this->absenceId}";
    }

    public function createDtoFromResponse(Response $response): Absence
    {
        return Absence::from($response->json());
    }
}
