<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;

it('can create a contact', function () {
    $request = new GetContactRequest(1);

    $response = testClient()->send($request);

    $contact = $request->createDtoFromResponse($response);

    expect($contact)->toBeInstanceOf(Contact::class)
        ->and($contact->name_1)->toBeString()->and($contact->id)->toBeInt();
});