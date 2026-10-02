<?php

use Bexio\Resources\Purchase\Bills\Bill;
use Bexio\Resources\Purchase\Bills\Requests\CreateBillRequest;
use Bexio\Resources\Purchase\Bills\Requests\UpdateBillRequest;

it('retains bill child identities only when updating and never writes calculated line taxes', function () {
    $bill = Bill::from([
        'id' => 'bill-1', 'supplier_id' => null, 'contact_partner_id' => null, 'address' => null,
        'bill_date' => '2026-10-02', 'due_date' => '2026-10-31',
        'split_into_line_items' => true,
        'line_items' => [['id' => 'line-1', 'position' => 0, 'amount' => 108.1, 'tax_calc' => 8.1]],
        'discounts' => [['id' => 'discount-1', 'position' => 0, 'amount' => 1.0]],
        'payment' => ['type' => 'IBAN', 'execution_date' => '2026-10-09', 'amount' => 107.1, 'account_no' => '000123'],
    ]);
    expect($bill->line_items[0]->id)->toBe('line-1')
        ->and($bill->line_items[0]->tax_calc)->toBe(8.1)
        ->and($bill->discounts[0]->id)->toBe('discount-1')
        ->and($bill->payment->account_no)->toBe('000123');
    $create = (new CreateBillRequest($bill))->body()->all();
    $update = (new UpdateBillRequest($bill))->body()->all();
    expect($create['line_items'][0])->not->toHaveKeys(['id', 'tax_calc'])
        ->and($create)->not->toHaveKey('split_into_line_items')
        ->and($update)->toHaveKey('split_into_line_items', true)
        ->and($create['discounts'][0])->not->toHaveKey('id')
        ->and($update['line_items'][0])->toHaveKey('id', 'line-1')->not->toHaveKey('tax_calc')
        ->and($update['discounts'][0])->toHaveKey('id', 'discount-1')
        ->and($update['payment']['account_no'])->toBe('000123');
});
