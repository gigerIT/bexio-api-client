<?php

use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;

$testInvoice = null;

it('can create an Invoice', function () use (&$testInvoice) {
    $testInvoice = new Invoice(
        title: 'Test Invoice',
        contact_id: 1,
        is_valid_from: date('Y-m-d'),
        is_valid_to: date('Y-m-d', strtotime('+14 days')),
    );

    $salesAccount = testSalesAccount();

    $testInvoice->positions->add(
        new ItemPositionCustom(
            tax_id: $salesAccount->tax_id,
            account_id: $salesAccount->id,
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        )
    );

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

it('can find an Invoice by invoice date range via the search endpoint', function () use (&$testInvoice) {
    $invoice = Invoice::useClient(testClient())->find($testInvoice->id);

    $invoices = Invoice::useClient(testClient())
        ->query()
        ->status(InvoiceStatus::DRAFT)
        ->validBetween($invoice->invoice_date, $invoice->is_valid_to)
        ->orderBy('id', 'desc')
        ->limit(100)
        ->get();

    expect($invoices)->toBeArray()
        ->and($invoices[0])->toBeInstanceOf(Invoice::class)
        ->and(array_map(static fn (Invoice $invoice): ?int => $invoice->id, $invoices))->toContain($testInvoice->id);
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

it('can create an Invoice with an article position', function () {
    $client = testClient();
    $createdInvoice = null;

    try {
        $items = Item::useClient($client)->all();
    } catch (Throwable $exception) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $exception->getMessage());
    }

    $item = collect($items)->first(fn (Item $item): bool => $item->id !== null && $item->unit_id !== null);

    if (! $item instanceof Item) {
        \PHPUnit\Framework\Assert::markTestSkipped('No item with a unit is available for article-position invoice testing.');
    }

    $salesAccount = testSalesAccount();
    $text = $item->intern_name !== '' ? $item->intern_name : ($item->intern_code !== '' ? $item->intern_code : 'Article position');

    try {
        $invoice = new Invoice(
            title: sprintf('Article Position Invoice %s', uniqid()),
            contact_id: 1,
            is_valid_from: date('Y-m-d'),
            is_valid_to: date('Y-m-d', strtotime('+14 days')),
            positions: new ItemPositionCollection([
                new ItemPositionArticle(
                    amount: '1',
                    unit_id: $item->unit_id,
                    account_id: $salesAccount->id,
                    tax_id: $salesAccount->tax_id,
                    text: $text,
                    unit_price: '123.45',
                    article_id: $item->id,
                    discount_in_percent: '0',
                ),
            ]),
        );

        $createdInvoice = $invoice->attachClient($client)->create();
        $articlePosition = $createdInvoice->positions
            ->first(fn ($position): bool => $position instanceof ItemPositionArticle);

        expect($createdInvoice)->toBeInstanceOf(Invoice::class)
            ->and($createdInvoice->id)->toBeInt()
            ->and($articlePosition)->toBeInstanceOf(ItemPositionArticle::class)
            ->and($articlePosition->article_id)->toBe($item->id);
    } finally {
        if ($createdInvoice instanceof Invoice) {
            try {
                $createdInvoice->attachClient($client)->delete();
            } catch (Throwable) {
                // Cleanup failures should not hide the regression assertion result.
            }
        }
    }
});

it('can delete an Invoice', function () use (&$testInvoice) {
    $response = $testInvoice->attachClient(testClient())->delete();
    expect($response)->toBeTrue();
})->depends('it can create an Invoice', 'it can issue an Invoice', 'it can revert an issued Invoice');
