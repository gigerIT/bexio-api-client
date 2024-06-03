<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use function Pest\Faker\fake;

it('can create a contact', function () {
    $request = new GetContactRequest(1);

    $response = testClient()->send($request);

    $contact = $request->createDtoFromResponse($response);

    expect($contact)->toBeInstanceOf(Contact::class)
        ->and($contact->name_1)->toBeString()->and($contact->id)->toBeInt();


    $contact->


    $contact->name_1 = fake()->name;



});