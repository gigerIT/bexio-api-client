<?php

use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\InvoiceReminder;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Support\Data\SearchCriteria;

$testInvoice = null;
$testReminder = null;

it('can create an Invoice for reminder tests', function () use (&$testInvoice) {
    $testInvoice = new Invoice(
        title: sprintf('Reminder Invoice %s', uniqid()),
        contact_id: 1,
        is_valid_from: date('Y-m-d', strtotime('-30 days')),
        is_valid_to: date('Y-m-d', strtotime('-14 days')),
    );

    $salesAccount = testSalesAccount();

    $testInvoice->positions->add(
        new ItemPositionCustom(
            tax_id: testSaleTaxId(),
            account_id: $salesAccount->id,
            amount: '10',
            text: 'Reminder Test Position',
            unit_price: '100',
        )
    );

    $testInvoice = $testInvoice->attachClient(testClient())->create();

    expect($testInvoice)->toBeInstanceOf(Invoice::class)
        ->and($testInvoice->id)->toBeInt();
});

it('can issue the Invoice before creating reminders', function () use (&$testInvoice) {
    $response = Invoice::useClient(testClient())->issue($testInvoice->id);

    expect($response->successful())->toBeTrue();
})->depends('it can create an Invoice for reminder tests');

it('can create an InvoiceReminder', function () use (&$testInvoice, &$testReminder) {
    $testReminder = new InvoiceReminder(kb_invoice_id: $testInvoice->id);
    $testReminder = $testReminder->attachClient(testClient())->create();

    expect($testReminder)->toBeInstanceOf(InvoiceReminder::class)
        ->and($testReminder->id)->toBeInt()
        ->and($testReminder->kb_invoice_id)->toBe($testInvoice->id);
})->depends('it can create an Invoice for reminder tests', 'it can issue the Invoice before creating reminders');

it('can get InvoiceReminders for an invoice', function () use (&$testInvoice, &$testReminder) {
    $reminders = InvoiceReminder::useClient(testClient())
        ->query()
        ->forInvoice($testInvoice->id)
        ->get();

    expect($reminders)->toBeArray()
        ->and($reminders[0])->toBeInstanceOf(InvoiceReminder::class)
        ->and(array_map(static fn (InvoiceReminder $reminder): ?int => $reminder->id, $reminders))->toContain($testReminder->id);
})->depends('it can create an InvoiceReminder');

it('can get an InvoiceReminder', function () use (&$testReminder) {
    $reminder = $testReminder->attachClient(testClient())->find($testReminder->id);

    expect($reminder)->toBeInstanceOf(InvoiceReminder::class)
        ->and($reminder->id)->toBe($testReminder->id)
        ->and($reminder->kb_invoice_id)->toBe($testReminder->kb_invoice_id);
})->depends('it can create an InvoiceReminder');

it('can search InvoiceReminders for an invoice', function () use (&$testInvoice, &$testReminder) {
    $reminders = InvoiceReminder::useClient(testClient())
        ->query()
        ->forInvoice($testInvoice->id)
        ->where('reminder_level', SearchCriteria::EQUAL, (string) $testReminder->reminder_level)
        ->get();

    expect($reminders)->toBeArray()
        ->and($reminders[0])->toBeInstanceOf(InvoiceReminder::class)
        ->and(array_map(static fn (InvoiceReminder $reminder): ?int => $reminder->id, $reminders))->toContain($testReminder->id);
})->depends('it can create an InvoiceReminder');

it('can delete an InvoiceReminder', function () use (&$testReminder) {
    expect($testReminder->attachClient(testClient())->delete())->toBeTrue();
})->depends('it can create an InvoiceReminder', 'it can search InvoiceReminders for an invoice');

it('can revert the Invoice after deleting reminders', function () use (&$testInvoice) {
    $response = Invoice::useClient(testClient())->revertIssue($testInvoice->id);

    expect($response->successful())->toBeTrue();
})->depends('it can issue the Invoice before creating reminders', 'it can delete an InvoiceReminder');

it('can delete the Invoice used for reminder tests', function () use (&$testInvoice) {
    expect($testInvoice->attachClient(testClient())->delete())->toBeTrue();
})->depends('it can create an Invoice for reminder tests', 'it can revert the Invoice after deleting reminders');
