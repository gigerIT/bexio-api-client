<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Sales\Invoices\Invoice;
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
