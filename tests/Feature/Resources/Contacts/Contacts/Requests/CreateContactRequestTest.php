<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use function Pest\Faker\fake;

it('can create a Contact', function () {

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

    $newContact = $contact->attachClient(testClient())->create();

    expect($newContact)->toBeInstanceOf(Contact::class)
        ->and($newContact->name_1)->toBeString()->and($newContact->id)->toBeInt();
});