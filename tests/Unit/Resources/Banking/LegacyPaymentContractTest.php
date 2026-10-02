<?php

use Bexio\BexioClient;
use Bexio\Resources\Banking\IbanPayments\IbanPayment;
use Bexio\Resources\Banking\IbanPayments\Requests\CreateIbanPaymentRequest;
use Bexio\Resources\Banking\IbanPayments\Requests\GetIbanPaymentRequest;
use Bexio\Resources\Banking\IbanPayments\Requests\UpdateIbanPaymentRequest;
use Bexio\Resources\Banking\QrPayments\QrPayment;
use Bexio\Resources\Banking\QrPayments\Requests\CreateQrPaymentRequest;
use Bexio\Resources\Banking\QrPayments\Requests\GetQrPaymentRequest;
use Bexio\Resources\Banking\QrPayments\Requests\UpdateQrPaymentRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

it('preserves legacy payment bodies and bank context through create update and show', function (
    string $resourceClass, string $createClass, string $updateClass, string $showClass, string $type,
) {
    $body = [
        'instructed_amount' => ['currency' => 'CHF', 'amount' => 1.25],
        'recipient' => [
            'name' => 'API Test', 'street' => 'Teststrasse', 'zip' => '8000',
            'city' => 'Zurich', 'country_code' => 'CH', 'house_number' => '1',
        ],
        'iban' => 'CH8100700110005554634',
        'execution_date' => '2026-10-05',
        'is_salary_payment' => false,
        'is_editing_restricted' => false,
        'message' => 'API contract test',
        'allowance_type' => null,
        'qr_reference_nr' => $type === 'qr' ? '210000000003139471430009017' : null,
        'additional_information' => null,
    ];
    $wire = ['id' => 17, 'uuid' => 'payment-uuid', 'type' => $type, 'payment' => $body];
    $updatedBody = [...$body, 'message' => 'Updated API contract test'];
    $mock = new MockClient([
        $createClass => MockResponse::make($wire, 201),
        $updateClass => MockResponse::make([...$wire, 'payment' => $updatedBody]),
        $showClass => MockResponse::make([...$wire, 'payment' => $updatedBody]),
    ]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);

    $created = $resourceClass::from(['bank_account_id' => 4, 'payment' => $body])->attachClient($client)->create();
    $created->payment->message = $updatedBody['message'];
    $updated = $created->update();
    $shown = $resourceClass::useClient($client)->forBankAccount(4)->find(17);

    expect($created->bank_account_id)->toBe(4)
        ->and($updated->bank_account_id)->toBe(4)
        ->and($shown->bank_account_id)->toBe(4)
        ->and($shown->payment->message)->toBe('Updated API contract test');

    $endpoint = "/3.0/banking/bank_accounts/4/{$type}_payments";
    $mock->assertSent(fn (Request $request): bool =>
        $request instanceof $createClass && $request->getMethod() === Method::POST
        && $request->resolveEndpoint() === $endpoint && $request->body()->all() === $body
    );
    $mock->assertSent(fn (Request $request): bool =>
        $request instanceof $updateClass && $request->getMethod() === Method::PATCH
        && $request->resolveEndpoint() === $endpoint . '/17' && $request->body()->all() === $updatedBody
    );
    $mock->assertSent(fn (Request $request): bool =>
        $request instanceof $showClass && $request->getMethod() === Method::GET
        && $request->resolveEndpoint() === $endpoint . '/17'
    );
})->with([
    'IBAN' => [IbanPayment::class, CreateIbanPaymentRequest::class, UpdateIbanPaymentRequest::class, GetIbanPaymentRequest::class, 'iban'],
    'QR' => [QrPayment::class, CreateQrPaymentRequest::class, UpdateQrPaymentRequest::class, GetQrPaymentRequest::class, 'qr'],
]);
