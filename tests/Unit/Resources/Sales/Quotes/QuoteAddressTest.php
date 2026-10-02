<?php

use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Resources\Sales\Quotes\Requests\CreateQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\UpdateQuoteRequest;

it('writes manual quote addresses and keeps response project identity out of the body', function () {
    $quote = Quote::from([
        'id' => 42, 'project_id' => 3, 'contact_id' => 4,
        'contact_address_manual' => 'Recipient\nStreet 1',
        'delivery_address_manual' => 'Warehouse\nStreet 2', 'delivery_address_type' => 1,
    ]);
    expect($quote->project_id)->toBe(3);
    foreach ([new CreateQuoteRequest($quote), new UpdateQuoteRequest($quote)] as $request) {
        expect($request->body()->all())->toMatchArray([
            'contact_address_manual' => 'Recipient\nStreet 1',
            'delivery_address_manual' => 'Warehouse\nStreet 2', 'delivery_address_type' => 1,
        ])->not->toHaveKey('project_id');
    }
});
