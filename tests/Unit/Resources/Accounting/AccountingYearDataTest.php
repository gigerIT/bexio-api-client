<?php

use Bexio\Resources\Accounting\BusinessYears\BusinessYear;
use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\AccountGroups\AccountGroup;

it('hydrates account group id from the API response field', function () {
    $account = Account::from([
        'id' => 1,
        'uuid' => 'c7da5b70-2d27-467e-abd9-9c3ac0f83c7d',
        'account_no' => '3201',
        'name' => 'Gross proceeds credit sales',
        'account_type' => 1,
        'tax_id' => 40,
        'fibu_account_group_id' => 65,
        'is_active' => true,
        'is_locked' => false,
    ]);

    expect($account->account_group_id)->toBe(65);
});

it('hydrates account group fields from the API response fields', function () {
    $accountGroup = AccountGroup::from([
        'id' => 1,
        'uuid' => '5fe93c8a-b05f-4004-91f5-9177ffd011fd',
        'account_no' => '1',
        'name' => 'Assets',
        'parent_fibu_account_group_id' => 3,
        'is_active' => true,
        'is_locked' => false,
    ]);

    expect($accountGroup->parent_id)->toBe(3)
        ->and($accountGroup->account_no)->toBe('1')
        ->and($accountGroup->is_active)->toBeTrue()
        ->and($accountGroup->is_locked)->toBeFalse();
});

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
