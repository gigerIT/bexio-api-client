<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Quote;

it('can create a Quote', function () {

    $quote = new Quote(title: 'Test Quote', contact_id: 1, user_id: 1);

    $request = new CreateQuoteRequest($quote);

    $response = testClient()->send($request);

    $quote = $request->createDtoFromResponse($response);

    expect($quote->title)->toBe('Test Quote')
        ->and($quote->kb_item_status_id)->toBe(QuoteStatus::DRAFT);
});