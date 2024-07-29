<?php

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;

it('can create a Comment for a Invoice', function () {
    $testInvoice = new \Bexio\Resources\Sales\Invoices\Invoice(
        title: 'Test Invoice',
        contact_id: 1,
    );

    $testInvoice->positions->add(
        new \Bexio\Resources\Sales\ItemPositions\ItemPositionCustom(
            tax_id: testSaleTaxId(),
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        ));

    $testInvoice = $testInvoice->attachClient(testClient())->create();


    $comment = new Comment(
        text: 'This is a comment',
    );

    $comment = $comment->attachClient(testClient())->createFor(KbDocumentType::INVOICE, $testInvoice->id);

    expect($comment->text)->toBe('This is a comment')
        ->and($comment->id)->toBeInt();
});
