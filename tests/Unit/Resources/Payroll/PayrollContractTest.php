<?php

use Bexio\BexioClient;
use Bexio\Resources\Payroll\Absences\Absence;
use Bexio\Resources\Payroll\Absences\Requests\CreateAbsenceRequest;
use Bexio\Resources\Payroll\Absences\Requests\GetAbsenceRequest;
use Bexio\Resources\Payroll\Absences\Requests\GetAbsencesRequest;
use Bexio\Resources\Payroll\Absences\Requests\UpdateAbsenceRequest;
use Bexio\Resources\Payroll\Employees\Employee;
use Bexio\Resources\Payroll\Employees\Requests\CreateEmployeeRequest;
use Bexio\Resources\Payroll\Employees\Requests\UpdateEmployeeRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('preserves absence employee context for subsequent writes', function () {
    $payload = ['id' => 'absence-1', 'reason' => 'holiday', 'start_date' => '2026-10-02'];
    $mock = new MockClient([
        GetAbsencesRequest::class => MockResponse::make(['data' => [$payload]]),
        GetAbsenceRequest::class => MockResponse::make($payload),
        CreateAbsenceRequest::class => MockResponse::make($payload, 201),
        UpdateAbsenceRequest::class => MockResponse::make('', 204),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);
    $list = new GetAbsencesRequest('employee-1', 2026);
    $show = new GetAbsenceRequest('employee-1', 'absence-1');
    $create = new CreateAbsenceRequest(new Absence(employee_id: 'employee-1', reason: 'holiday', start_date: '2026-10-02'));
    $absences = $list->createDtoFromResponse($client->send($list));
    $absences[] = $show->createDtoFromResponse($client->send($show));
    $absences[] = $create->createDtoFromResponse($client->send($create));
    foreach ($absences as $absence) {
        expect($absence->employee_id)->toBe('employee-1');
    }
    $update = new UpdateAbsenceRequest($absences[0]);
    expect($update->createDtoFromResponse($client->send($update)))->toBe($absences[0]);
    $mock->assertSent(fn ($r): bool => $r instanceof GetAbsencesRequest && $r->query()->all() === ['businessYear' => 2026]);
    $mock->assertSent(fn ($r): bool => $r instanceof UpdateAbsenceRequest && $r->getMethod() === Method::PUT
        && $r->resolveEndpoint() === '/4.0/payroll/employees/employee-1/absences/absence-1'
        && $r->body()->all() === ['reason' => 'holiday', 'start_date' => '2026-10-02', 'end_date' => null, 'half_day' => null, 'continued_pay' => null, 'disability' => null, 'paid_hours' => null]);
});

it('writes structured employee addresses and handles an empty successful update', function () {
    $employee = Employee::from([
        'id' => 'employee-1', 'first_name' => 'Test', 'last_name' => 'Employee',
        'address' => ['street_name' => 'Teststrasse', 'house_number' => '7', 'zip_code' => '8000', 'city' => 'Zurich', 'country' => 'CH'],
        'stay_permit_category' => 'B', 'employment_level' => 100,
    ]);
    $mock = new MockClient([UpdateEmployeeRequest::class => MockResponse::make('', 204)]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);
    $request = new UpdateEmployeeRequest($employee);
    expect($request->createDtoFromResponse($client->send($request)))->toBe($employee);
    foreach ([new CreateEmployeeRequest($employee), $request] as $write) {
        expect($write->body()->all()['address'])->toBe($employee->address)
            ->and($write->body()->all())->not->toHaveKeys(['id', 'stay_permit_category', 'employment_level']);
    }
    $mock->assertSent(fn ($r): bool => $r->getMethod() === Method::PATCH && $r->resolveEndpoint() === '/4.0/payroll/employees/employee-1');
});
