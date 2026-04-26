<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Absences\Requests;

use Bexio\Resources\Payroll\Absences\Absence;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAbsencesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int|string $employeeId,
        protected readonly int $businessYear,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/payroll/employees/{$this->employeeId}/absences";
    }

    protected function defaultQuery(): array
    {
        return [
            'businessYear' => $this->businessYear,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Absence::collect($response->json('data') ?? []);
    }
}
