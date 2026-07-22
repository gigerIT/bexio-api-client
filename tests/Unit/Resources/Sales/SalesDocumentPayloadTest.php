<?php

use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Quote;
use Illuminate\Support\Collection;

it('serializes invoice create and update payloads with current field exclusions', function () {
    $invoice = new Invoice(
        id: 123,
        document_nr: 'RE-00001',
        title: 'Invoice payload',
        contact_id: 1,
        mwst_type: MwstType::INCLUDING,
        mwst_is_net: true,
        is_valid_from: '2026-05-01',
        is_valid_to: '2026-05-31',
        positions: new ItemPositionCollection([
            new ItemPositionCustom(text: 'Custom invoice position'),
        ]),
    );
    $invoice->total = '10.810000';
    $invoice->total_gross = '10.810000';
    $invoice->total_net = '10.000000';
    $invoice->total_taxes = '0.810000';
    $invoice->invoice_date = '2026-05-01';
    $invoice->currency_code = 'CHF';
    $invoice->exchange_rate = 1.0;
    $invoice->base_currency_amount = 10.81;
    $invoice->base_currency_code = 'CHF';
    $invoice->project_id = 88;
    $invoice->viewed_by_client_at = '2026-05-02 12:00:00';

    $createPayload = $invoice->toApi()->toArray();
    $updatePayload = $invoice->toUpdateApi()->toArray();

    expect($createPayload)
        ->toHaveKey('title', 'Invoice payload')
        ->toHaveKey('positions')
        ->not->toHaveKeys([
            'id',
            'document_nr',
            'mwst_is_net',
            'total',
            'invoice_date',
            'currency_code',
            'exchange_rate',
            'base_currency_amount',
            'base_currency_code',
            'project_id',
            'viewed_by_client_at',
        ])
        ->and($updatePayload)
        ->toHaveKey('title', 'Invoice payload')
        ->toHaveKey('mwst_is_net', true)
        ->not->toHaveKeys([
            'id',
            'document_nr',
            'positions',
            'total',
            'invoice_date',
            'currency_code',
            'exchange_rate',
            'base_currency_amount',
            'base_currency_code',
            'project_id',
            'viewed_by_client_at',
        ]);
});

it('serializes order create and update payloads with current field exclusions', function () {
    $order = new Order(
        id: 123,
        title: 'Order payload',
        contact_id: 1,
        is_valid_from: '2026-05-01',
        is_valid_to: '2026-05-31',
        reference: 'ORDER-REF',
        positions: new ItemPositionCollection([
            new ItemPositionCustom(text: 'Custom order position'),
        ]),
    );
    $order->document_nr = 'AB-00001';
    $order->total = '10.810000';
    $order->total_gross = '10.810000';
    $order->total_net = '10.000000';
    $order->total_taxes = '0.810000';
    $order->delivery_address = 'Delivery address';
    $order->mwst_is_net = true;
    $order->project_id = 88;
    $order->viewed_by_client_at = '2026-05-02 12:00:00';
    $order->is_recurring = true;

    $createPayload = $order->toApi()->toArray();
    $updatePayload = $order->toUpdateApi()->toArray();

    expect($createPayload)
        ->toHaveKey('title', 'Order payload')
        ->toHaveKey('document_nr', 'AB-00001')
        ->toHaveKey('positions')
        ->not->toHaveKeys([
            'id',
            'mwst_is_net',
            'total',
            'delivery_address',
            'project_id',
            'is_valid_to',
            'reference',
            'viewed_by_client_at',
            'is_recurring',
        ])
        ->and($updatePayload)
        ->toHaveKey('title', 'Order payload')
        ->toHaveKey('mwst_is_net', true)
        ->not->toHaveKeys([
            'id',
            'document_nr',
            'positions',
            'total',
            'delivery_address',
            'project_id',
            'is_valid_to',
            'reference',
            'viewed_by_client_at',
            'is_recurring',
        ]);
});

it('serializes quote create and update payloads with current field exclusions', function () {
    $quote = new Quote(
        id: 123,
        title: 'Quote payload',
        contact_id: 1,
        is_valid_from: '2026-05-01',
        is_valid_until: '2026-05-31',
        viewed_by_client_at: '2026-05-02 12:00:00',
        positions: new ItemPositionCollection([
            new ItemPositionCustom(text: 'Custom quote position'),
        ]),
    );
    $quote->document_nr = 'AN-00001';
    $quote->total = '10.810000';
    $quote->total_gross = '10.810000';
    $quote->total_net = '10.000000';
    $quote->total_taxes = '0.810000';
    $quote->show_total = true;
    $quote->delivery_address = 'Delivery address';
    $quote->mwst_is_net = true;

    $createPayload = $quote->toApi()->toArray();
    $updatePayload = $quote->toUpdateApi()->toArray();

    expect($createPayload)
        ->toHaveKey('title', 'Quote payload')
        ->toHaveKey('positions')
        ->toHaveKey('mwst_is_net', true)
        ->not->toHaveKeys([
            'id',
            'document_nr',
            'total',
            'show_total',
            'delivery_address',
            'viewed_by_client_at',
        ])
        ->and($updatePayload)
        ->toHaveKey('title', 'Quote payload')
        ->toHaveKey('mwst_is_net', true)
        ->not->toHaveKeys([
            'id',
            'document_nr',
            'positions',
            'total',
            'show_total',
            'delivery_address',
            'viewed_by_client_at',
        ]);
});

it('omits quote mwst_is_net on create until explicitly set', function () {
    $quote = new Quote(title: 'Quote without net flag');

    expect($quote->toApi()->toArray())
        ->toHaveKey('title', 'Quote without net flag')
        ->not->toHaveKey('mwst_is_net');
});
