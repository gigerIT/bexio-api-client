<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use function Pest\Faker\fake;

$testContact = null;

it('can create a Contact', function () use (&$testContact) {
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

    $testContact = $contact->attachClient(testClient())->create();

    expect($testContact)->toBeInstanceOf(Contact::class)
        ->and($testContact->name_1)->toBeString()
        ->and($testContact->id)->toBeInt();
});


it('can get Contacts', function () {
    $contacts = Contact::useClient(testClient())->all();

    expect($contacts)->toBeArray()->and($contacts[0])->toBeInstanceOf(Contact::class);
})->depends('it can create a Contact');


it('can get a Contact', function () use (&$testContact) {
    $contact = Contact::useClient(testClient())->find($testContact->id);

    expect($contact)->toBeInstanceOf(Contact::class)
        ->and($contact->name_1)->toBeString()->and($contact->id)->toBeInt();
})->depends('it can create a Contact');


it('can update a Contact', function () use (&$testContact) {
    $testContact->name_1 = fake()->firstName();
    $testContact->name_2 = fake()->lastName();

    $testContact->save();

    expect($testContact->name_1)->toBeString()->and($testContact->name_2)->toBeString();
})->depends('it can get a Contact');


it('can delete a Contact', function () use (&$testContact) {
    expect($testContact->delete())->toBeTrue();
})->depends('it can create a Contact');
