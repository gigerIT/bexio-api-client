<?php

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Bexio\Resources\Accounting\CalendarYears\Requests\CreateCalendarYearRequest;
use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Sales\DocumentTemplates\DocumentTemplate;

it('omits hydrated calendar metadata when reusing a year for creation', function () {
    $year = CalendarYear::from([
        'id' => 12,
        'start' => '2026-01-01',
        'end' => '2026-12-31',
        'created_at' => '2025-12-01T10:00:00',
        'updated_at' => '2025-12-02T10:00:00',
        'is_annual_reporting' => true,
    ]);
    $year->year = '2027';

    expect($year->created_at)->toBe('2025-12-01T10:00:00')
        ->and($year->updated_at)->toBe('2025-12-02T10:00:00')
        ->and((new CreateCalendarYearRequest($year))->body()->all())
        ->toMatchArray(['year' => '2027', 'is_annual_reporting' => true])
        ->not->toHaveKeys(['id', 'uuid', 'date_start', 'date_end', 'created_at', 'updated_at']);
});

it('preserves international bank address and clearing identifiers as strings', function () {
    $account = BankAccount::from(['owner_zip' => 'SW1A 1AA', 'bc_nr' => '0076']);

    expect($account->owner_zip)->toBe('SW1A 1AA')
        ->and($account->bc_nr)->toBe('0076');
});

it('exposes the API template slug through the existing public property', function () {
    $template = DocumentTemplate::from(['template_slug' => 'standard', 'name' => 'Standard']);

    expect($template->slug)->toBe('standard')
        ->and($template->toArray())->toHaveKey('slug', 'standard');
});
