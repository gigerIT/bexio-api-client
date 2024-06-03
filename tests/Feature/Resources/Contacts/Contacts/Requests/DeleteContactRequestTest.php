<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use function Pest\Faker\fake;

it('can delete a Contact', function () {
    $contact = new Contact(name_1: fake()->company());

    $contact = $contact->useClient(testClientDebug())->create();

    expect($contact->delete())->toBeTrue();
});