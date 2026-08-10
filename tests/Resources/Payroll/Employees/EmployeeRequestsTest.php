<?php

namespace Bexio\Resources\Payroll\Employees\Requests;

use Bexio\BexioClient;
use Bexio\Resources\Payroll\Absences\Absence;
use Bexio\Resources\Payroll\Absences\Requests\CreateAbsenceRequest;
use Bexio\Resources\Payroll\Absences\Requests\DeleteAbsenceRequest;
use Bexio\Resources\Payroll\Absences\Requests\GetAbsenceRequest;
use Bexio\Resources\Payroll\Absences\Requests\GetAbsencesRequest;
use Bexio\Resources\Payroll\Absences\Requests\UpdateAbsenceRequest;
use Bexio\Resources\Payroll\Documents\Requests\GetPaystubPdfRequest;
use Bexio\Resources\Payroll\Documents\PaystubPdf;
use Bexio\Resources\Payroll\Employees\Employee;
use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('builds employee requests', function () {
    $employee = new Employee(
        id: '497f6eca-6276-4993-bfeb-53cbbbba6f08',
        email: 'person@example.com',
        first_name: 'Ada',
        last_name: 'Lovelace',
        personal_number: 'P-001',
        nationality: 'CH',
        iban: 'CH9300762011623852957',
        ahv_number: '756.1234.5678.97',
        marital_status: 'unknown',
        gender: 'female',
        date_of_birth: '1990-01-31',
        address: ['country' => 'CH', 'city' => 'Zurich'],
        language: 'de',
        phone_number: '+41440000000',
        annual_vacation_days: 25,
    );

    expect((new GetEmployeesRequest())->resolveEndpoint())
        ->toBe('/4.0/payroll/employees')
        ->and((new CreateEmployeeRequest($employee))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees')
        ->and((new GetEmployeeRequest($employee->id, '2026-04-26'))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08')
        ->and((new UpdateEmployeeRequest($employee))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08');

    $query = new \ReflectionMethod(GetEmployeeRequest::class, 'defaultQuery');
    $query->setAccessible(true);
    $body = new \ReflectionMethod(CreateEmployeeRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($query->invoke(new GetEmployeeRequest($employee->id, '2026-04-26')))
        ->toBe(['date' => '2026-04-26'])
        ->and($body->invoke(new CreateEmployeeRequest($employee)))
        ->toMatchArray([
            'email' => 'person@example.com',
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'annual_vacation_days' => 25,
        ])
        ->not->toHaveKeys([
            'id',
            'hours_per_week',
            'employment_level',
            'annual_vacation_days_total',
            'annual_vacation_days_used',
            'annual_vacation_days_left',
            'effective_working_hours_per_week',
        ]);
});

it('defaults employee snapshot requests to today', function () {
    CarbonImmutable::setTestNow('2026-04-27 14:30:00');

    try {
        $query = new \ReflectionMethod(GetEmployeeRequest::class, 'defaultQuery');
        $query->setAccessible(true);

        expect($query->invoke(new GetEmployeeRequest('497f6eca-6276-4993-bfeb-53cbbbba6f08')))
            ->toBe(['date' => '2026-04-27']);
    } finally {
        CarbonImmutable::setTestNow();
    }
});

it('preserves an explicit employee snapshot date', function () {
    CarbonImmutable::setTestNow('2026-04-27 14:30:00');

    try {
        $query = new \ReflectionMethod(GetEmployeeRequest::class, 'defaultQuery');
        $query->setAccessible(true);

        expect($query->invoke(new GetEmployeeRequest(
            '497f6eca-6276-4993-bfeb-53cbbbba6f08',
            '2025-12-31',
        )))->toBe(['date' => '2025-12-31']);
    } finally {
        CarbonImmutable::setTestNow();
    }
});

it("sends today's snapshot date when refreshing an employee", function () {
    CarbonImmutable::setTestNow('2026-04-27 14:30:00');

    try {
        $mockClient = new MockClient([
            GetEmployeeRequest::class => MockResponse::make([
                'id' => '497f6eca-6276-4993-bfeb-53cbbbba6f08',
                'email' => 'person@example.com',
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
            ]),
        ]);
        $client = (new BexioClient('mock-token'))->withMockClient($mockClient);
        $employee = (new Employee(id: '497f6eca-6276-4993-bfeb-53cbbbba6f08'))
            ->attachClient($client);

        $refreshed = $employee->refresh();

        expect($refreshed)->toBeInstanceOf(Employee::class)
            ->and($refreshed->id)->toBe($employee->id);

        $mockClient->assertSent(fn (GetEmployeeRequest $request): bool =>
            $request->query()->get('date') === '2026-04-27'
        );
    } finally {
        CarbonImmutable::setTestNow();
    }
});

it('hydrates payroll list response envelopes', function () {
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        GetEmployeesRequest::class => MockResponse::make([
            'data' => [[
                'id' => '497f6eca-6276-4993-bfeb-53cbbbba6f08',
                'email' => 'person@example.com',
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
            ]],
        ]),
        GetAbsencesRequest::class => MockResponse::make([
            'data' => [[
                'id' => 'c56a4180-65aa-42ec-a945-5fd21dec0538',
                'reason' => 'Vacation',
                'start_date' => '2026-04-01',
                'end_date' => '2026-04-02',
            ]],
        ]),
    ]));

    $employeesRequest = new GetEmployeesRequest();
    $employees = $employeesRequest->createDtoFromResponse($client->send($employeesRequest));

    $absencesRequest = new GetAbsencesRequest('497f6eca-6276-4993-bfeb-53cbbbba6f08', 2026);
    $absences = $absencesRequest->createDtoFromResponse($client->send($absencesRequest));

    expect($employees)->toBeArray()
        ->and($employees[0])->toBeInstanceOf(Employee::class)
        ->and($employees[0]->id)->toBe('497f6eca-6276-4993-bfeb-53cbbbba6f08')
        ->and($absences)->toBeArray()
        ->and($absences[0])->toBeInstanceOf(Absence::class)
        ->and($absences[0]->id)->toBe('c56a4180-65aa-42ec-a945-5fd21dec0538');
});

it('builds absence and paystub requests', function () {
    $absence = new Absence(
        employee_id: '497f6eca-6276-4993-bfeb-53cbbbba6f08',
        id: 'c56a4180-65aa-42ec-a945-5fd21dec0538',
        reason: 'Vacation',
        start_date: '2026-04-01',
        end_date: '2026-04-02',
        half_day: false,
        continued_pay: 0,
        disability: 0,
        paid_hours: 8,
    );

    expect((new GetAbsencesRequest($absence->employee_id, 2026))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/absences')
        ->and((new CreateAbsenceRequest($absence))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/absences')
        ->and((new GetAbsenceRequest($absence->employee_id, $absence->id))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/absences/c56a4180-65aa-42ec-a945-5fd21dec0538')
        ->and((new UpdateAbsenceRequest($absence))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/absences/c56a4180-65aa-42ec-a945-5fd21dec0538')
        ->and((new DeleteAbsenceRequest($absence->employee_id, $absence->id))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/absences/c56a4180-65aa-42ec-a945-5fd21dec0538')
        ->and((new GetPaystubPdfRequest($absence->employee_id, 2026, 4))->resolveEndpoint())
        ->toBe('/4.0/payroll/employees/497f6eca-6276-4993-bfeb-53cbbbba6f08/paystub-pdf/2026/4');

    $query = new \ReflectionMethod(GetAbsencesRequest::class, 'defaultQuery');
    $query->setAccessible(true);
    $body = new \ReflectionMethod(CreateAbsenceRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($query->invoke(new GetAbsencesRequest($absence->employee_id, 2026)))
        ->toBe(['businessYear' => 2026])
        ->and($body->invoke(new CreateAbsenceRequest($absence)))
        ->toMatchArray([
            'reason' => 'Vacation',
            'start_date' => '2026-04-01',
            'end_date' => '2026-04-02',
            'half_day' => false,
            'continued_pay' => 0,
            'disability' => 0,
            'paid_hours' => 8,
        ])
        ->not->toHaveKeys(['id', 'employee_id']);
});

it('preserves the submitted absence after a successful update without response content', function () {
    $absence = new Absence(
        employee_id: '497f6eca-6276-4993-bfeb-53cbbbba6f08',
        id: 'c56a4180-65aa-42ec-a945-5fd21dec0538',
        reason: 'Sickness',
        start_date: '2026-08-01',
        end_date: '2026-08-03',
    );
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        UpdateAbsenceRequest::class => MockResponse::make('', 204),
    ]));
    $request = new UpdateAbsenceRequest($absence);

    $updated = $request->createDtoFromResponse($client->send($request));

    expect($updated)->toBe($absence);
});

it('preserves payroll paystub download locations', function () {
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        GetPaystubPdfRequest::class => MockResponse::make([
            'location' => 'https://example.test/paystub.pdf',
        ]),
    ]));

    $request = new GetPaystubPdfRequest('497f6eca-6276-4993-bfeb-53cbbbba6f08', 2026, 4);
    $paystub = $request->createDtoFromResponse($client->send($request));

    expect($paystub)->toBeInstanceOf(PaystubPdf::class)
        ->and($paystub->location)->toBe('https://example.test/paystub.pdf');
});

it('reads live payroll employees', function () {
    $employees = Employee::useClient(testClient())->all();

    if (count($employees) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No payroll employees available');
    }

    $employee = Employee::useClient(testClient())->find($employees[0]->id, now()->toDateString());

    expect($employee)->toBeInstanceOf(Employee::class)
        ->and($employee->id)->toBeString();
});
