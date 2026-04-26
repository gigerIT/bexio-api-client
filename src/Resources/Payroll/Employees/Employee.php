<?php
declare(strict_types=1);

namespace Bexio\Resources\Payroll\Employees;

use Bexio\Resources\Payroll\Employees\Requests\CreateEmployeeRequest;
use Bexio\Resources\Payroll\Employees\Requests\GetEmployeeRequest;
use Bexio\Resources\Payroll\Employees\Requests\GetEmployeesRequest;
use Bexio\Resources\Payroll\Employees\Requests\UpdateEmployeeRequest;
use Bexio\Resources\Resource;

class Employee extends Resource
{
    public const INDEX_REQUEST = GetEmployeesRequest::class;
    public const SHOW_REQUEST = GetEmployeeRequest::class;
    public const CREATE_REQUEST = CreateEmployeeRequest::class;
    public const UPDATE_REQUEST = UpdateEmployeeRequest::class;

    public function __construct(
        public ?string $id = null,
        public ?string $email = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $personal_number = null,
        public ?string $nationality = null,
        public ?string $iban = null,
        public ?string $ahv_number = null,
        public ?string $marital_status = null,
        public ?string $gender = null,
        public ?string $date_of_birth = null,
        public ?array $address = null,
        public ?string $language = null,
        public ?string $phone_number = null,
        public ?int $annual_vacation_days = null,
        public int|float|null $hours_per_week = null,
        public int|float|null $employment_level = null,
        public int|float|null $annual_vacation_days_total = null,
        public int|float|null $annual_vacation_days_used = null,
        public int|float|null $annual_vacation_days_left = null,
        public int|float|null $effective_working_hours_per_week = null,
    ) {
    }

    public function find(int|string $id, ?string $date = null): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $id, $date);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function toApi(): Employee
    {
        return $this->except(
            'id',
            'hours_per_week',
            'employment_level',
            'annual_vacation_days_total',
            'annual_vacation_days_used',
            'annual_vacation_days_left',
            'effective_working_hours_per_week',
        );
    }
}
