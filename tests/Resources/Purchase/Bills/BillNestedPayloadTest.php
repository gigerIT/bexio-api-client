<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\BillAddress;
use Bexio\Resources\Purchase\Bills\BillDiscount;
use Bexio\Resources\Purchase\Bills\BillLineItem;
use Illuminate\Support\Str;

it('preserves bill line and discount identities on update and renews them on copied creation', function () {
    $client = testClient();
    $supplier = (new Contact(name_1: 'Bill child sync ' . Str::uuid()))->attachClient($client)->create();
    $bill = null;
    $copy = null;
    try {
        $bill = (new Bill(
            supplier_id: $supplier->id, contact_partner_id: $supplier->id,
            address: new BillAddress(lastname_company: 'API sync', address_line: 'Teststrasse 1', postcode: '8000', city: 'Zurich', country_code: 'CH'),
            bill_date: date('Y-m-d'), due_date: date('Y-m-d', strtotime('+14 days')),
            line_items: [new BillLineItem(amount: 100, title: 'Original line')],
            discounts: [new BillDiscount(position: 0, amount: 5)], amount_calc: 95,
        ))->attachClient($client)->create();
        $lineId = $bill->line_items[0]->id;
        $discountId = $bill->discounts[0]->id;
        expect($lineId)->toBeString()->and($discountId)->toBeString()
            ->and($bill->line_items[0]->tax_calc)->toBeFloat();
        $bill->line_items[0]->title = 'Updated line';
        $bill = $bill->update();
        expect($bill->line_items[0]->id)->toBe($lineId)
            ->and($bill->discounts[0]->id)->toBe($discountId)
            ->and($bill->line_items[0]->title)->toBe('Updated line');
        $copy = (clone $bill)->create();
        expect($copy->id)->not->toBe($bill->id)
            ->and($copy->line_items[0]->id)->not->toBe($lineId)
            ->and($copy->discounts[0]->id)->not->toBe($discountId);
    } finally {
        $copy?->delete();
        $bill?->delete();
        $supplier->delete();
    }
});
