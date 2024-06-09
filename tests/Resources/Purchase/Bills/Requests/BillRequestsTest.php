<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\BillAddress;
use Bexio\Resources\Purchase\Bills\BillLineItem;
use Bexio\Resources\Purchase\Bills\Enums\BillAddressType;

$testBill = null;

it('can create a Bill', closure: function () use (&$testBill) {
    $testBill = new Bill(
        supplier_id: 1,
        contact_partner_id: 1,
        address: new BillAddress(
            lastname_company: 'Test Company',
            type: BillAddressType::COMPANY,
            address_line: 'Test Street 1',
            postcode: '1234',
            city: 'Test City',
            country_code: 'CH',
        ),
        bill_date: '2024-01-01',
        due_date: '2024-12-31',
        line_items: [
            new BillLineItem(
                amount: 100.00,
                position: 0,
                title: 'Test Line Item',
            )
        ],
        title: 'Test Bill',
        vendor_ref: 'Test Vendor Ref 123',
    );


    $testBill = $testBill->attachClient(testClient())->create();

    expect($testBill)->toBeInstanceOf(Bill::class)
        ->and($testBill->id)->toBeString()
        ->and($testBill->supplier_id)->toBeInt()
        ->and($testBill->title)->toBe('Test Bill')
        ->and($testBill->vendor_ref)->toBe('Test Vendor Ref 123');
});

it('can get Bills', function () {
    $bills = Bill::useClient(testClient())->all();
    expect($bills)->toBeArray()->and($bills[0])->toBeInstanceOf(Bill::class);
})->depends('it can create a Bill');


it('can get a Bill', function () use (&$testBill) {
    $bill = Bill::useClient(testClient())->find($testBill->id);
    expect($bill)->toBeInstanceOf(Bill::class)
        ->and($bill->id)->toBeString()
        ->and($bill->supplier_id)->toBeInt()
        ->and($bill->title)->toBe('Test Bill')
        ->and($bill->vendor_ref)->toBe('Test Vendor Ref 123');
})->depends('it can create a Bill');


it('can update a Bill', function () use (&$testBill) {
    $testBill->title = 'Updated Test Bill';
    $testBill->vendor_ref = 'Updated Test Vendor Ref 123';

    $testBill = $testBill->attachClient(testClient())->update();

    expect($testBill)->toBeInstanceOf(Bill::class)
        ->and($testBill->id)->toBeString()
        ->and($testBill->supplier_id)->toBeInt()
        ->and($testBill->title)->toBe('Updated Test Bill')
        ->and($testBill->vendor_ref)->toBe('Updated Test Vendor Ref 123');
})->depends('it can create a Bill', 'it can get a Bill');


it('can duplicate a Bill', function () use (&$testBill) {
    $duplicate = $testBill->attachClient(testClient())->duplicate();
    expect($duplicate)->toBeInstanceOf(Bill::class)
        ->and($duplicate->id)->toBeString()
        ->and($duplicate->supplier_id)->toBeInt()
        ->and($duplicate->title)->toBe('Updated Test Bill')
        ->and($duplicate->vendor_ref)->toBe('Updated Test Vendor Ref 123');

    $duplicate->delete();

})->depends('it can create a Bill', 'it can get a Bill', 'it can update a Bill');


it('can delete a Bill', function () use (&$testBill) {
    $result = $testBill->attachClient(testClient())->delete();
    expect($result)->toBeTrue();
})->depends('it can create a Bill', 'it can get a Bill', 'it can update a Bill', 'it can duplicate a Bill');