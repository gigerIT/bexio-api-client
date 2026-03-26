<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Support\Data\SearchCriteria;
use function Pest\Faker\fake;

$testContact = null;



it('can create a Contact', function () use (&$testContact) {
    $contact = new Contact(
        contact_type_id: fake()->randomElement([ContactType::PERSON, ContactType::COMPANY]),
        name_1: fake()->firstName(),
        name_2: fake()->lastName(),
        street_name: fake()->streetName(),
        house_number: fake()->buildingNumber(),
        postcode: fake()->randomNumber(4),
        city: fake()->city(),
        mail: fake()->safeEmail(),
        phone_fixed: fake()->phoneNumber(),
    );

    $testContact = $contact->attachClient(testClient())->save();

    expect($testContact)->toBeInstanceOf(Contact::class)
        ->and($testContact->name_1)->toBeString()
        ->and($testContact->id)->toBeInt();
});


it('can get Contacts', function () {
    $contacts = Contact::useClient(testClient())->all();

    expect($contacts)->toBeArray()->and($contacts[0])->toBeInstanceOf(Contact::class);

});


it('can get Contacts using query builder', function () {
    $contacts = Contact::useClient(testClient())->query()->limit(10)->get();

    expect($contacts)->toBeArray()
        ->and(count($contacts))->toBeLessThanOrEqual(10);
});


it('can get Contacts with archived using query builder', function () {
    $contacts = Contact::useClient(testClient())->query()->withArchived()->limit(5)->get();

    expect($contacts)->toBeArray()
        ->and(count($contacts))->toBeLessThanOrEqual(5);
});


it('can get first Contact using query builder', function () {
    $contact = Contact::useClient(testClient())->query()->first();

    expect($contact)->toBeInstanceOf(Contact::class)
        ->and($contact->id)->toBeInt();
});


it('can get a Contact', function () use (&$testContact) {
    $contact = Contact::useClient(testClient())->find($testContact->id);

    expect($contact)->toBeInstanceOf(Contact::class)
        ->and($contact->name_1)->toBeString()->and($contact->id)->toBeInt();
})->depends('it can create a Contact');


it('can search a Contact', function () use (&$testContact) {
    $contacts = Contact::useClient(testClient())
        ->query()
        ->where('name_1', SearchCriteria::LIKE, $testContact->name_1)
        ->where('name_2', SearchCriteria::LIKE, $testContact->name_2)
        ->get();

    expect($contacts)->toBeArray()->and($contacts[0])->toBeInstanceOf(Contact::class);
})->depends('it can create a Contact');


it('can update a Contact', function () use (&$testContact) {
    $testContact->name_1 = fake()->firstName();
    $testContact->name_2 = fake()->lastName();

    $testContact->save();

    expect($testContact->name_1)->toBeString()->and($testContact->name_2)->toBeString();
})->depends('it can get a Contact');


it('can bulk create Contacts', function () {
    $contacts = [
        new Contact(
            name_1: fake()->firstName(),
            contact_type_id: ContactType::PERSON,
            name_2: fake()->lastName(),
        ),
        new Contact(
            name_1: fake()->company(),
            contact_type_id: ContactType::COMPANY,
        ),
    ];

    $createdContacts = Contact::bulkCreate($contacts, testClient());

    expect($createdContacts)->toBeArray()
        ->and(count($createdContacts))->toBe(2)
        ->and($createdContacts[0])->toBeInstanceOf(Contact::class)
        ->and($createdContacts[0]->id)->toBeInt();

    // Clean up
    foreach ($createdContacts as $contact) {
        $contact->attachClient(testClient())->delete();
    }
});


it('can restore a Contact', function () {
    // Create and delete a contact first
    $contact = new Contact(
        name_1: fake()->firstName(),
        contact_type_id: ContactType::PERSON,
    );
    $createdContact = $contact->attachClient(testClient())->save();
    $createdContact->delete();

    // Restore it
    $result = $createdContact->restore();

    expect($result)->toBeArray()
        ->and($result['success'])->toBeTrue();

    // Clean up
    $createdContact->delete();
});


it('can delete a Contact', function () use (&$testContact) {
    expect($testContact->delete())->toBeTrue();
})->depends('it can create a Contact');

