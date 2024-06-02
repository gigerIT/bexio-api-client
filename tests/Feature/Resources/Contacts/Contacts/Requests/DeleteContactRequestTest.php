<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use function Pest\Faker\fake;

it('can create a contact', function () {
    $contact = new Contact(name_1: fake()->company());
    $request = new CreateContactRequest($contact);
    $response = testClient()->send($request);
    $contact = Contact::from($response->json());

    $request = new DeleteContactRequest($contact->id);

    $response = testClient()->send($request);

    expect($response->status())->toBe(200);
});