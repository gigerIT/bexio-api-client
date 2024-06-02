<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use function Pest\Faker\fake;

it('can create a contact', function () {

    $contact = new Contact(
        name_1: fake()->firstName(),
        contact_type_id: ContactType::PERSON,
        name_2: fake()->lastName(),
        address: fake()->streetAddress(),
        postcode: fake()->randomNumber(4),
        city: fake()->city(),
        mail: fake()->safeEmail(),
        phone_fixed: fake()->phoneNumber(),
    );

    $request = new CreateContactRequest($contact);

    $response = testClient()->send($request);

    $newContact = $request->createDtoFromResponse($response);

    expect($newContact)->toBeInstanceOf(Contact::class)
        ->and($newContact->name_1)->toBeString()->and($newContact->id)->toBeInt();
});