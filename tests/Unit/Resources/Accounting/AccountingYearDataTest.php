<?php

use Bexio\Resources\Accounting\BusinessYears\BusinessYear;
use Bexio\Resources\Accounting\CalendarYears\CalendarYear;

it('hydrates calendar year dates from API response fields', function () {
    $calendarYear = CalendarYear::from([
        'id' => 1,
        'start' => '2026-01-01',
        'end' => '2026-12-31',
        'year' => '2026',
    ]);

    expect($calendarYear->date_start)->toBe('2026-01-01')
        ->and($calendarYear->date_end)->toBe('2026-12-31')
        ->and($calendarYear->year)->toBe('2026');
});

it('keeps calendar year response dates out of create payloads', function () {
    $calendarYear = CalendarYear::from([
        'id' => 1,
        'start' => '2026-01-01',
        'end' => '2026-12-31',
        'year' => '2026',
    ]);

    expect($calendarYear->toApi()->toArray())->toBe([
        'year' => '2026',
        'is_vat_subject' => null,
        'is_annual_reporting' => null,
        'vat_accounting_method' => null,
        'vat_accounting_type' => null,
        'default_tax_income_id' => null,
        'default_tax_expense_id' => null,
    ]);
});

it('hydrates business year dates and status from API response fields', function () {
    $businessYear = BusinessYear::from([
        'id' => 1,
        'start' => '2026-01-01',
        'end' => '2026-12-31',
        'status' => 'open',
        'closed_at' => null,
    ]);

    expect($businessYear->date_start)->toBe('2026-01-01')
        ->and($businessYear->date_end)->toBe('2026-12-31')
        ->and($businessYear->status)->toBe('open')
        ->and($businessYear->closed_at)->toBeNull();
});
