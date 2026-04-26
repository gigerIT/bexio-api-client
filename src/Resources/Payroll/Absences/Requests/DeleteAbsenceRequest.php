<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Absences\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteAbsenceRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly int|string $employeeId,
        protected readonly int|string $absenceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId}/absences/{$this->absenceId}";
    }
}
