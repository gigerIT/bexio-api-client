<?php

use Bexio\Resources\Accounting\Accounts\Requests\GetAccountsRequest;
use Bexio\Resources\Accounting\CalendarYears\Requests\GetCalendarYearsRequest;
use Bexio\Resources\Accounting\Reports\Requests\GetJournalRequest;
use Bexio\Resources\Accounting\Taxes\Requests\GetTaxesRequest;
use Bexio\Resources\Banking\BankAccounts\Requests\GetBankAccountsRequest;
use Bexio\Resources\Sales\DocumentTemplates\Requests\GetDocumentTemplatesRequest;
use Bexio\Resources\Sales\Deliveries\Requests\GetDeliveriesRequest;
use Bexio\Resources\Purchase\Bills\Requests\GetBillsRequest;

it('preserves documented metadata from live list responses', function (string $requestClass, array $fields) {
    $request = new $requestClass();
    if ($requestClass !== GetDocumentTemplatesRequest::class) {
        $request->query()->add('limit', 2);
    }
    $response = testClient()->send($request);
    $payload = $response->json('data') ?? $response->json();

    if (count($payload) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No records available for ' . $requestClass);
    }

    $resources = $request->createDtoFromResponse($response);

    foreach ($fields as $wireName => $property) {
        expect($payload[0])->toHaveKey($wireName);
        expect($resources[0]->{$property})->toEqual($payload[0][$wireName]);
    }
})->with([
    'account UUID' => [GetAccountsRequest::class, ['uuid' => 'uuid']],
    'calendar timestamps' => [GetCalendarYearsRequest::class, ['created_at' => 'created_at', 'updated_at' => 'updated_at']],
    'journal references and currency amounts' => [GetJournalRequest::class, [
        'debit_account_id' => 'debit_account_id', 'credit_account_id' => 'credit_account_id',
        'currency_id' => 'currency_id', 'base_currency_id' => 'base_currency_id',
        'currency_factor' => 'currency_factor', 'base_currency_amount' => 'base_currency_amount',
        'ref_id' => 'ref_id', 'ref_class' => 'ref_class', 'ref_uuid' => 'ref_uuid',
    ]],
    'tax months' => [GetTaxesRequest::class, ['start_month' => 'start_month', 'end_month' => 'end_month']],
    'bank account identifiers' => [GetBankAccountsRequest::class, ['uuid' => 'uuid', 'owner_zip' => 'owner_zip', 'bc_nr' => 'bc_nr']],
    'document template slug' => [GetDocumentTemplatesRequest::class, ['template_slug' => 'slug']],
    'delivery address type' => [GetDeliveriesRequest::class, ['delivery_address_type' => 'delivery_address_type']],
    'bill list metadata' => [GetBillsRequest::class, [
        'booking_account_ids' => 'booking_account_ids', 'gross' => 'gross', 'net' => 'net', 'vendor' => 'vendor',
    ]],
]);
