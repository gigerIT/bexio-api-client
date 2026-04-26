<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Absences\Requests;

use Bexio\Resources\Payroll\Absences\Absence;
use LogicException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateAbsenceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Absence $absence)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId()}/absences";
    }

    protected function defaultBody(): array
    {
        return $this->absence->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Absence
    {
        return Absence::from($response->json());
    }

    private function employeeId(): string
    {
        if ($this->absence->employee_id === null) {
            throw new LogicException('employee_id is required to create an absence.');
        }

        return $this->absence->employee_id;
    }
}
