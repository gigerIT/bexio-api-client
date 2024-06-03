<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\Quotes\Quote;

it('can create a Quote', function () {

    $quote = new Quote(title: 'Test Quote', contact_id: 1, user_id: 1);

    $quote->positions = [
   new ItemPositionCustom(
   )
    ];

    $request = new CreateQuoteRequest($quote);

    $response = testClient()->debug()->send($request);

    $quote = $request->createDtoFromResponse($response);

    expect($quote->title)->toBe('Test Quote');


});