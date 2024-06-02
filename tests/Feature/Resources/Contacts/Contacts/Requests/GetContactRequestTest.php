<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use function Pest\Faker\fake;

it('can create a contact', function () {
    $request = new GetContactRequest(1);

    $response = testClient()->send($request);

    $newContact = $request->createDtoFromResponse($response);

    expect($newContact)->toBeInstanceOf(Contact::class)
        ->and($newContact->name_1)->toBeString()->and($newContact->id)->toBeInt();
});