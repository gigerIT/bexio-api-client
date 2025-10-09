<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;
use Illuminate\Support\Collection;

it('can create a Quote', function () {

    $quote = new Quote(title: 'Test Quote', contact_id: 1, user_id: 1, positions: new Collection());

    $salesAccount = testSalesAccount();

    $quote->positions->add(
        new ItemPositionCustom(
            tax_id: $salesAccount->tax_id,
            account_id: $salesAccount->id,
            amount: '10',
            text: 'Test Position',
            unit_price: '100',
        )
    );


    $quote = $quote->attachClient(testClient())->create();


    expect($quote)->toBeInstanceOf(Quote::class)
        ->and($quote->title)->toBe('Test Quote')
        ->and($quote->kb_item_status_id)->toBe(QuoteStatus::DRAFT);
});