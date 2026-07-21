<?php

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;

it('can create list fetch and delete a disposable InvoicePayment', function () {
    $client = testClient();
    $bankAccount = collect(BankAccount::useClient($client)->all())
        ->first(fn (BankAccount $account): bool => $account->id !== null);

    if (! $bankAccount instanceof BankAccount) {
        \PHPUnit\Framework\Assert::markTestSkipped('No bank account available');
    }

    $invoice = new Invoice(
        title: sprintf('Payment Invoice %s', uniqid()),
        contact_id: 1,
        is_valid_from: date('Y-m-d'),
        is_valid_to: date('Y-m-d', strtotime('+30 days')),
    );

    $salesAccount = testSalesAccount();
    $invoice->positions->add(new ItemPositionCustom(
        tax_id: testSaleTaxId(),
        account_id: $salesAccount->id,
        amount: '1',
        text: 'Payment Test Position',
        unit_price: '10',
    ));

    $createdInvoice = null;
    $createdPayment = null;
    $invoiceIssued = false;

    try {
        $createdInvoice = $invoice->attachClient($client)->create();
        $issueResponse = Invoice::useClient($client)->issue($createdInvoice->id);
        $invoiceIssued = $issueResponse->successful();

        expect($invoiceIssued)->toBeTrue();

        $createdPayment = (new InvoicePayment(
            kb_invoice_id: $createdInvoice->id,
            date: date('Y-m-d'),
            value: '10.00',
            bank_account_id: $bankAccount->id,
        ))
            ->attachClient($client)
            ->create();

        expect($createdPayment)->toBeInstanceOf(InvoicePayment::class)
            ->and($createdPayment->id)->toBeInt()
            ->and($createdPayment->kb_invoice_id)->toBe($createdInvoice->id);

        $payments = InvoicePayment::useClient($client)
            ->query()
            ->forInvoice($createdInvoice->id)
            ->get();

        $fetchedPayment = InvoicePayment::useClient($client)
            ->forInvoice($createdInvoice->id)
            ->find($createdPayment->id);

        expect($payments)->toBeArray()
            ->and(array_map(static fn (InvoicePayment $payment): ?int => $payment->id, $payments))->toContain($createdPayment->id)
            ->and($fetchedPayment)->toBeInstanceOf(InvoicePayment::class)
            ->and($fetchedPayment->id)->toBe($createdPayment->id);
    } finally {
        if ($createdPayment?->id !== null) {
            $createdPayment->attachClient($client)->delete();
        }

        if ($invoiceIssued && $createdInvoice?->id !== null) {
            Invoice::useClient($client)->revertIssue($createdInvoice->id);
        }

        if ($createdInvoice?->id !== null) {
            $createdInvoice->attachClient($client)->delete();
        }
    }
});
