<?php

use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;


$testInvoice = null;

it('can create an Invoice', function () use (&$testInvoice) {
    $testInvoice = new Invoice(
        title: 'Test Invoice',
        contact_id: 1,
    );

    $testInvoice->positions->add(
        new ItemPositionCustom(
            tax_id: testSaleTaxId(),
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        ));


//    $testInvoice->positions->add(
//        new \Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition(
//            text: 'Subposition',
//        )
//    );

    $testInvoice = $testInvoice->attachClient(testClient())->create();

    $testInvoice->addComment('Test Comment');

    expect($testInvoice->id)->toBeInt();
});

it('can get a specific Invoice', function () use (&$testInvoice) {
    $invoice = Invoice::useClient(testClient())->find(23);
    expect($invoice)->toBeInstanceOf(Invoice::class)->and($invoice->id)->toBeInt();

    dump($invoice->positions);
});

it('can get an Invoice', function () use (&$testInvoice) {
    $invoice = Invoice::useClient(testClient())->find($testInvoice->id);
    expect($invoice)->toBeInstanceOf(Invoice::class)->and($invoice->id)->toBeInt();

    dump($invoice->toArray());

})->depends('it can create an Invoice');