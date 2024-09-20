<?php

use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;

$testInvoice = null;

it('can create an Invoice with a subitem position', function () use (&$testInvoice) {
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

    $testInvoice = $testInvoice->attachClient(testClient())->create();
    expect($testInvoice->id)->toBeInt();


    $subItemPosition = new ItemPositionSubposition(
        text: 'This is a container to group other position types',
    );
    $subItemPosition = $testInvoice->addItemSubPosition($subItemPosition);


    $subItemPositionChild = new ItemPositionCustom(
        tax_id: testSaleTaxId(),
        amount: '10',
        text: 'Test Position',
        unit_price: '100',
    );
    $subItemPositionChild->attachTo($subItemPosition);

    $subItemPositionChild->attachClient(testClient())->createFor($testInvoice);
});