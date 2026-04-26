<?php

use Bexio\Resources\Accounting\CalendarYears\CalendarYear;
use Bexio\Resources\Accounting\CalendarYears\Requests\CreateCalendarYearRequest;
use Bexio\Resources\Accounting\Currencies\Currency;
use Bexio\Resources\Accounting\Currencies\Requests\CreateCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\DeleteCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrenciesRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrencyCodesRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrencyExchangeRatesRequest;
use Bexio\Resources\Accounting\Currencies\Requests\GetCurrencyRequest;
use Bexio\Resources\Accounting\Currencies\Requests\UpdateCurrencyRequest;
use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Bexio\Resources\Accounting\ManualEntries\Requests\CreateManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\DeleteManualEntryFileRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\DeleteManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\GetManualEntryFileRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\GetManualEntryFilesRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\GetNextManualEntryReferenceNumberRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\UpdateManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\UploadManualEntryFilesRequest;
use Bexio\BexioClient;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

function accountingDefaultBody(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultBody');
    $method->setAccessible(true);

    return $method->invoke($request);
}

function accountingDefaultQuery(Request $request): array
{
    $method = new ReflectionMethod($request, 'defaultQuery');
    $method->setAccessible(true);

    return $method->invoke($request);
}

it('builds a calendar year create request', function () {
    $calendarYear = new CalendarYear(
        year: '2027',
        is_vat_subject: true,
        is_annual_reporting: false,
        vat_accounting_method: 'effective',
        vat_accounting_type: 'agreed',
        default_tax_income_id: 1,
        default_tax_expense_id: 2,
    );

    $request = new CreateCalendarYearRequest($calendarYear);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/3.0/accounting/calendar_years')
        ->and(accountingDefaultBody($request))->toBe([
            'year' => '2027',
            'is_vat_subject' => true,
            'is_annual_reporting' => false,
            'vat_accounting_method' => 'effective',
            'vat_accounting_type' => 'agreed',
            'default_tax_income_id' => 1,
            'default_tax_expense_id' => 2,
        ]);
});

it('builds currency requests', function () {
    $currency = new Currency(id: 9, name: 'SEK', round_factor: 0.01);

    expect(Currency::DEFAULT_ID['CHF'])->toBe(1);

    $index = new GetCurrenciesRequest(limit: 20, offset: 40, embed: 'exchange_rate', date: '2024-05-17');
    $create = new CreateCurrencyRequest($currency);
    $update = new UpdateCurrencyRequest($currency);

    expect($index->resolveEndpoint())->toBe('/3.0/currencies')
        ->and(accountingDefaultQuery($index))->toBe([
            'limit' => 20,
            'offset' => 40,
            'embed' => 'exchange_rate',
            'date' => '2024-05-17',
        ])
        ->and($create->getMethod())->toBe(Method::POST)
        ->and(accountingDefaultBody($create))->toBe([
            'name' => 'SEK',
            'round_factor' => 0.01,
        ])
        ->and((new GetCurrencyRequest(9))->resolveEndpoint())->toBe('/3.0/currencies/9')
        ->and((new DeleteCurrencyRequest(9))->getMethod())->toBe(Method::DELETE)
        ->and((new DeleteCurrencyRequest(9))->resolveEndpoint())->toBe('/3.0/currencies/9')
        ->and($update->getMethod())->toBe(Method::PATCH)
        ->and($update->resolveEndpoint())->toBe('/3.0/currencies/9')
        ->and(accountingDefaultBody($update))->toBe(['round_factor' => 0.01])
        ->and((new GetCurrencyExchangeRatesRequest(9, '2024-05-17'))->resolveEndpoint())->toBe('/3.0/currencies/9/exchange_rates')
        ->and(accountingDefaultQuery(new GetCurrencyExchangeRatesRequest(9, '2024-05-17')))->toBe(['date' => '2024-05-17'])
        ->and((new GetCurrencyCodesRequest())->resolveEndpoint())->toBe('/3.0/currencies/codes');
});

it('hydrates embedded currency exchange rate fields', function () {
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        GetCurrenciesRequest::class => MockResponse::make([[
            'id' => 9,
            'name' => 'SEK',
            'round_factor' => 0.01,
            'exchange_rate' => 0.9849,
            'exchange_rate_id' => 2,
            'ratio' => 1,
            'exchange_rate_to_ratio' => 0.9849,
            'source' => 'manual',
            'source_reason' => 'test',
            'exchange_rate_date' => '2024-05-01',
        ]]),
    ]));

    $request = new GetCurrenciesRequest(embed: 'exchange_rate');
    $currencies = $request->createDtoFromResponse($client->send($request));

    expect($currencies[0])->toBeInstanceOf(Currency::class)
        ->and($currencies[0]->exchange_rate)->toBe(0.9849)
        ->and($currencies[0]->exchange_rate_id)->toBe(2)
        ->and($currencies[0]->exchange_rate_to_ratio)->toBe(0.9849)
        ->and($currencies[0]->exchange_rate_date)->toBe('2024-05-01');
});

it('builds manual entry write and file requests', function () {
    $manualEntry = new ManualEntry(
        id: 123,
        type: 'manual_single_entry',
        date: '2024-01-15',
        reference_nr: 'Booking 123',
        entries: [[
            'id' => 456,
            'debit_account_id' => 77,
            'credit_account_id' => 139,
            'description' => 'Test booking',
            'amount' => 328.25,
            'currency_id' => Currency::DEFAULT_ID['CHF'],
            'currency_factor' => 1,
        ]],
    );

    $create = new CreateManualEntryRequest($manualEntry);
    $update = new UpdateManualEntryRequest($manualEntry);

    expect($create->getMethod())->toBe(Method::POST)
        ->and($create->resolveEndpoint())->toBe('/3.0/accounting/manual_entries')
        ->and(accountingDefaultBody($create))->toMatchArray([
            'type' => 'manual_single_entry',
            'date' => '2024-01-15',
            'reference_nr' => 'Booking 123',
        ])
        ->and($update->getMethod())->toBe(Method::PUT)
        ->and($update->resolveEndpoint())->toBe('/3.0/accounting/manual_entries/123')
        ->and(accountingDefaultBody($update))->toMatchArray(['id' => 123])
        ->and((new DeleteManualEntryRequest(123))->getMethod())->toBe(Method::DELETE)
        ->and((new DeleteManualEntryRequest(123))->resolveEndpoint())->toBe('/3.0/accounting/manual_entries/123')
        ->and((new GetNextManualEntryReferenceNumberRequest())->resolveEndpoint())->toBe('/3.0/accounting/manual_entries/next_ref_nr');

    expect((new GetManualEntryFilesRequest(manualEntryId: 123, entryId: 456, limit: 5, offset: 10))->resolveEndpoint())
        ->toBe('/3.0/accounting/manual_entries/123/entries/456/files')
        ->and(accountingDefaultQuery(new GetManualEntryFilesRequest(manualEntryId: 123, entryId: 456, limit: 5, offset: 10)))->toBe([
            'limit' => 5,
            'offset' => 10,
        ])
        ->and((new GetManualEntryFilesRequest(manualEntryId: 123))->resolveEndpoint())->toBe('/3.0/accounting/manual_entries/123/files')
        ->and((new GetManualEntryFileRequest(manualEntryId: 123, fileId: 999, entryId: 456))->resolveEndpoint())
        ->toBe('/3.0/accounting/manual_entries/123/entries/456/files/999')
        ->and((new GetManualEntryFileRequest(manualEntryId: 123, fileId: 999))->resolveEndpoint())
        ->toBe('/3.0/accounting/manual_entries/123/files/999')
        ->and((new DeleteManualEntryFileRequest(manualEntryId: 123, fileId: 999, entryId: 456))->getMethod())->toBe(Method::DELETE)
        ->and((new DeleteManualEntryFileRequest(manualEntryId: 123, fileId: 999, entryId: 456))->resolveEndpoint())
        ->toBe('/3.0/accounting/manual_entries/123/entries/456/files/999');
});

it('builds multipart manual entry upload requests', function () {
    $path = tempnam(sys_get_temp_dir(), 'bexio-manual-entry-upload-');
    file_put_contents($path, '%PDF-1.4 test');

    $request = new UploadManualEntryFilesRequest(
        manualEntryId: 123,
        files: ['receipt' => $path],
        entryId: 456,
    );

    $body = accountingDefaultBody($request);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/3.0/accounting/manual_entries/123/entries/456/files')
        ->and($body)->toHaveCount(1)
        ->and($body[0])->toBeInstanceOf(MultipartValue::class)
        ->and($body[0]->name)->toBe('receipt');

    unlink($path);
});
