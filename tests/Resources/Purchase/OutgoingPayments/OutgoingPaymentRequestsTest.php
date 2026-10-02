<?php

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Accounting\Taxes\Tax;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\BillAddress;
use Bexio\Resources\Purchase\Bills\BillLineItem;
use Bexio\Resources\Purchase\Bills\Enums\BillAddressType;
use Bexio\Resources\Purchase\Bills\Enums\BillStatus;
use Bexio\Resources\Purchase\Bills\Requests\GetBillsRequest;
use Bexio\Resources\Purchase\OutgoingPayments\OutgoingPayment;
use Illuminate\Support\Str;

it('round trips an outgoing payment for its own bill', function (string $type) {
    $client = testClient();
    $bank = BankAccount::useClient($client)->query()->first();
    $tax = Tax::useClient($client)->query()->types('pre_tax')->date(date('Y-m-d'))->first();
    if ($bank === null || $tax === null) {
        test()->markTestSkipped('No bank account or purchase tax configured');
    }
    $supplier = (new Contact(name_1: 'Payment sync ' . Str::uuid()))->attachClient($client)->create();
    $bill = null;
    $payment = null;
    try {
        $bill = (new Bill(
            supplier_id: $supplier->id, contact_partner_id: $supplier->id,
            address: new BillAddress(lastname_company: 'API sync', type: BillAddressType::COMPANY, address_line: 'Teststrasse 7', postcode: '8000', city: 'Zurich', country_code: 'CH'),
            bill_date: date('Y-m-d'), due_date: date('Y-m-d'), amount_calc: 1.25,
            line_items: [new BillLineItem(amount: 1.25, booking_account_id: testAccountId(), tax_id: $tax->id)],
        ))->attachClient($client)->create();
        expect($bill->base_currency_code)->toBe('CHF');
        if ($type === 'MANUAL') {
            $list = new GetBillsRequest();
            $list->query()->add('document_no', $bill->document_no);
            $response = $client->send($list);
            $raw = $response->json('data')[0];
            $listedBill = $list->createDtoFromResponse($response)[0];
            expect($listedBill->id)->toBe($bill->id);
            foreach (['booking_account_ids', 'gross', 'net', 'vendor'] as $field) {
                expect($raw)->toHaveKey($field)->and($listedBill->{$field})->toEqual($raw[$field]);
            }
        }
        $bill = $bill->book();
        $payment = (new OutgoingPayment(
            bill_id: $bill->id, payment_type: $type, execution_date: date('Y-m-d', strtotime('+7 days')),
            amount: 1.25, currency_code: 'CHF', exchange_rate: 1, sender_bank_account_id: $bank->id,
            is_salary_payment: false,
            receiver_iban: $type === 'MANUAL' ? null : 'CH8100700110005554634',
            receiver_name: $type === 'MANUAL' ? null : 'API sync test',
            receiver_street: $type === 'MANUAL' ? null : 'Teststrasse',
            receiver_house_no: $type === 'MANUAL' ? null : '1',
            receiver_postcode: $type === 'MANUAL' ? null : '8000',
            receiver_city: $type === 'MANUAL' ? null : 'Zurich',
            receiver_country_code: $type === 'MANUAL' ? null : 'CH',
            fee_type: $type === 'IBAN' ? 'NO_FEE' : null,
            reference_no: $type === 'QR' ? 'RF7812345' : null,
            sender_iban: $type === 'MANUAL' ? null : $bank->iban_nr,
            sender_name: $type === 'MANUAL' ? null : $bank->owner,
            sender_street: $type === 'MANUAL' ? null : $bank->owner_address,
            sender_house_no: $type === 'MANUAL' ? null : (string) $bank->owner_house_number,
            sender_postcode: $type === 'MANUAL' ? null : (string) $bank->owner_zip,
            sender_city: $type === 'MANUAL' ? null : $bank->owner_city,
            sender_country_code: $type === 'MANUAL' ? null : $bank->owner_country_code,
        ))->attachClient($client)->create();
        $fetched = OutgoingPayment::useClient($client)->find($payment->id);
        $payments = OutgoingPayment::useClient($client)->query()->forBill($bill->id)->forPage(1, 5)->get();
        expect($fetched->id)->toBe($payment->id)
            ->and($fetched->payment_type)->toBe($type)
            ->and($fetched->created_at)->toBeString()
            ->and(array_column($payments, 'id'))->toContain($payment->id);
        if ($type !== 'MANUAL') {
            $payment->amount = 0.75;
            $payment->is_salary_payment = false;
            expect($payment->update()->amount)->toBe(0.75);
        }
    } finally {
        if ($payment !== null) {
            $payment->delete();
        }
        if ($bill !== null) {
            $bill->book(BillStatus::DRAFT)->delete();
        }
        $supplier->delete();
    }
})->with(['MANUAL', 'IBAN', 'QR']);
