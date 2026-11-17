<?php

use Bexio\Resources\Accounting\Taxes\Tax;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Other\Units\Unit;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\MwstType;

it('creates invoices with explicit tax modes and preserves gross totals', function () {
    $client = testClient();
    $contact = (new Contact(
        contact_type_id: ContactType::COMPANY,
        name_1: 'Invoice tax mode '.uniqid(),
    ))->attachClient($client)->create();
    $invoices = [];

    try {
        // The omitted mode records the account default without changing shared settings.
        foreach ([null, false, true] as $mode) {
            $invoice = new Invoice(
                title: 'Invoice tax mode '.uniqid(),
                contact_id: $contact->id,
                mwst_type: MwstType::INCLUDING,
                mwst_is_net: $mode,
                is_valid_from: date('Y-m-d'),
                is_valid_to: date('Y-m-d', strtotime('+14 days')),
            );
            $invoice->positions->add(new ItemPositionCustom(
                tax_id: testSaleTaxId(),
                account_id: testSalesAccount()->id,
                amount: '1',
                text: 'Tax mode regression',
                unit_price: '108.10',
            ));
            $created = $invoice->attachClient($client)->create();
            $invoices[] = $created;

            if ($mode === null) {
                expect($created->mwst_is_net)->toBeBool();
                continue;
            }

            $shown = Invoice::useClient($client)->find($created->id);
            expect($created->mwst_is_net)->toBe($mode)
                ->and($shown->mwst_is_net)->toBe($mode);

            if ($mode === false) {
                expect((float) $created->total)->toBe(108.10)
                    ->and((float) $shown->total)->toBe(108.10);
            }
        }
    } finally {
        foreach (array_reverse($invoices) as $invoice) {
            $invoice->attachClient($client)->delete();
        }
        $contact->attachClient($client)->delete();
    }
});

it('applies tax modes to invoice totals with article positions', function () {
    $client = testClient();
    $unit = Unit::useClient($client)->query()->first();
    if ($unit === null) {
        test()->markTestSkipped('No unit configured');
    }
    // testSaleTax() can be a 0 % tax, which would make every mode produce the same totals.
    $tax = collect(Tax::useClient($client)->query()->scope('active')->types('sales_tax')->get())
        ->first(fn (Tax $tax): bool => $tax->value > 0);
    if ($tax === null) {
        test()->markTestSkipped('No active sales tax with a positive rate');
    }
    $rate = $tax->value / 100;
    $contact = (new Contact(
        contact_type_id: ContactType::COMPANY,
        name_1: 'Invoice tax mode '.uniqid(),
    ))->attachClient($client)->create();
    $item = null;
    $invoices = [];

    try {
        $item = (new Item(intern_code: 'tax-mode-'.uniqid(), intern_name: 'Tax mode article', unit_id: $unit->id))
            ->attachClient($client)->create();

        // [mwst_type, mwst_is_net, expected total, expected total_taxes] for a 100.00 position.
        $cases = [
            [MwstType::INCLUDING, false, 100.0, 100 - 100 / (1 + $rate)],
            [MwstType::INCLUDING, true, 100 * (1 + $rate), 100 * $rate],
            [MwstType::EXCLUDING, null, 100.0, 0.0],
            [MwstType::EXEMPT, null, 100.0, 0.0],
        ];

        foreach ($cases as [$type, $isNet, $total, $taxes]) {
            $invoice = new Invoice(
                title: 'Invoice tax mode '.uniqid(),
                contact_id: $contact->id,
                mwst_type: $type,
                mwst_is_net: $isNet,
                is_valid_from: date('Y-m-d'),
                is_valid_to: date('Y-m-d', strtotime('+14 days')),
            );
            $invoice->positions->add(new ItemPositionArticle(
                amount: '1',
                unit_id: $unit->id,
                account_id: testSalesAccount()->id,
                tax_id: $tax->id,
                text: 'Tax mode article',
                unit_price: '100',
                article_id: $item->id,
                discount_in_percent: '0',
            ));
            $created = $invoice->attachClient($client)->create();
            $invoices[] = $created;

            expect((float) $created->total)->toEqualWithDelta($total, 0.05)
                ->and((float) $created->total_taxes)->toEqualWithDelta($taxes, 0.01)
                ->and($created->taxs)->toHaveCount($taxes > 0 ? 1 : 0);
        }
    } finally {
        foreach (array_reverse($invoices) as $invoice) {
            $invoice->attachClient($client)->delete();
        }
        $item?->attachClient($client)->delete();
        $contact->attachClient($client)->delete();
    }
});
