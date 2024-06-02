<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use function Pest\Faker\fake;

it('can create a contact', function () {
    $request = new CreateContactRequest(new Contact(name_1: fake()->company()));
    $response = testClient()->send($request);
    $contact = $request->createDtoFromResponse($response);

    $request = new DeleteContactRequest($contact->id);

    $response = testClient()->send($request);

    expect($response->status())->toBe(200);
});