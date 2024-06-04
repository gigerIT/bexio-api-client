<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\BillAddress;
use Bexio\Resources\Purchase\Bills\BillLineItem;
use Bexio\Resources\Purchase\Bills\Enums\BillAddressType;

it('can create a Bill', closure: function () {
    $bill = new Bill(
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
        title: 'Test Bill'
    );


    $bill = $bill->attachClient(testClient())->create();

    expect($bill)->toBeInstanceOf(Bill::class);

    dump($bill);

});