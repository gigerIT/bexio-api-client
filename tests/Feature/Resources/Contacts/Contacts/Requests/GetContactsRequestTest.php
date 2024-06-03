<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;

it('can get a contact', function () {
    $contacts = Contact::useClient(testClient())->all();

    expect($contacts)->toBeArray()
        ->and($contacts[0])->toBeInstanceOf(Contact::class)
        ->and($contacts[0]->name_1)->toBeString()->and($contacts[0]->id)->toBeInt();
});