<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Items\Items\Item;
use Bexio\Resources\Other\Units\Unit;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionDiscount;
use Bexio\Resources\Sales\ItemPositions\ItemPositionPagebreak;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubtotal;
use Bexio\Resources\Sales\ItemPositions\ItemPositionText;
use Illuminate\Support\Str;

it('round trips every position type and reuses hydrated positions for writes', function (string $documentClass) {
    $client = testClient();
    $unit = Unit::useClient($client)->query()->first();
    if ($unit === null) {
        test()->markTestSkipped('No unit configured');
    }
    $contact = (new Contact(name_1: 'Position sync ' . Str::uuid()))->attachClient($client)->create();
    $item = null;
    $invoice = null;
    try {
        $item = (new Item(intern_code: 'sync-' . Str::random(8), intern_name: 'API position fixture', unit_id: $unit->id))
            ->attachClient($client)->create();
        $invoice = (new $documentClass(contact_id: $contact->id, title: 'Position sync'))->attachClient($client)->create();
        $tax = testSaleTaxId();
        $account = testSalesAccount()->id;
        $positions = [
            new ItemPositionCustom(tax_id: $tax, amount: '1', unit_id: $unit->id, account_id: $account, text: 'Custom', unit_price: '10', discount_in_percent: '0'),
            new ItemPositionArticle(amount: '1', unit_id: $unit->id, account_id: $account, tax_id: $tax, text: 'Article', unit_price: '10', article_id: $item->id, discount_in_percent: '0'),
            new ItemPositionText(text: 'Text', show_pos_nr: true),
            new ItemPositionSubposition(text: 'Group'),
            new ItemPositionSubtotal(text: 'Subtotal'),
            new ItemPositionDiscount(text: 'Discount', is_percentual: true, value: '10'),
            new ItemPositionPagebreak(),
        ];
        foreach ($positions as $position) {
            $created = $position->attachClient($client)->createFor($invoice);
            $shown = $invoice->position($created->type, $created->id);
            expect($shown)->toBeInstanceOf($position::class);
            if ($shown instanceof ItemPositionArticle || $shown instanceof ItemPositionCustom) {
                expect($shown->position_total)->toBeString()->and($shown->tax_value)->toBeString();
            }
            if ($shown instanceof ItemPositionCustom) {
                $taxes = array_values($invoice->refresh()->taxs);
                expect($taxes)->not->toBeEmpty()->and(data_get($taxes[0], 'value'))->toBeString();
            }
            if (property_exists($shown, 'text')) {
                $shown->text = 'Updated ' . $shown->text;
            }
            $updated = $invoice->updatePosition($shown);
            expect($updated->id)->toBe($created->id);
            $copy = $updated->attachClient($client)->createFor($invoice);
            expect($copy->id)->not->toBe($created->id);
            $listed = $invoice->positionsByType($created->type);
            expect(array_column($listed, 'id'))->toContain($created->id, $copy->id);
            $invoice->deletePosition($copy);
            $invoice->deletePosition($updated);
        }
    } finally {
        $invoice?->delete();
        $item?->delete();
        $contact->delete();
    }
})->with([Invoice::class, \Bexio\Resources\Sales\Orders\Order::class, \Bexio\Resources\Sales\Quotes\Quote::class]);
