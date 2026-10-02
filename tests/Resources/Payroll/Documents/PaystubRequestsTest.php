<?php

use Bexio\Resources\Payroll\Documents\Requests\DownloadPaystubPdfRequest;
use Bexio\Resources\Payroll\Employees\Employee;

it('downloads a live employee paystub as PDF', function () {
    $client = testFullAccountClient();
    $employees = Employee::useClient($client)->all();

    if (count($employees) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No payroll employees available for a paystub download');
    }

    $period = now()->subMonthNoOverflow();
    $response = $client->send(new DownloadPaystubPdfRequest(
        $employees[0]->id, $period->year, $period->month,
    ));

    expect($response->status())->toBe(200)
        ->and($response->header('Content-Type'))->toStartWith('application/pdf')
        ->and($response->body())->toStartWith('%PDF-');
});
