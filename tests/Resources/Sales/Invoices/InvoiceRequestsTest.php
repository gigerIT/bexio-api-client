<?php

use Bexio\Resources\Sales\Comments\Comment;
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

    $testInvoice = $testInvoice->attachClient(testClient())->create();
    expect($testInvoice->id)->toBeInt();
});

it('can get Invoices', function () {
    $invoices = Invoice::useClient(testClient())->all();
    expect($invoices)->toBeArray()->and($invoices[0])->toBeInstanceOf(Invoice::class);
})->depends('it can create an Invoice');

it('can get an Invoice', function () use (&$testInvoice) {
    $invoice = Invoice::useClient(testClient())->find($testInvoice->id);
    expect($invoice)->toBeInstanceOf(Invoice::class)->and($invoice->id)->toBeInt();
})->depends('it can create an Invoice');


it('can add a comment to an invoice', function () use (&$testInvoice) {
    $comment = $testInvoice->addComment('Test Comment');
    expect($comment)->toBeInstanceOf(Comment::class)->and($comment->id)->toBeInt();
})->depends('it can create an Invoice');


it('can issue an Invoice', function () use (&$testInvoice) {
    $response = Invoice::useClient(testClient())->issue($testInvoice->id);
    expect($response->successful())->toBeTrue();
})->depends('it can create an Invoice');


it('can revert an issued Invoice', function () use (&$testInvoice) {
    $response = Invoice::useClient(testClient())->revertIssue($testInvoice->id);
    expect($response->successful())->toBeTrue();
})->depends('it can create an Invoice', 'it can issue an Invoice');

it('can delete an Invoice', function () use (&$testInvoice) {
    $response = $testInvoice->attachClient(testClient())->delete();
    expect($response)->toBeTrue();
})->depends('it can create an Invoice', 'it can issue an Invoice', 'it can revert an issued Invoice');