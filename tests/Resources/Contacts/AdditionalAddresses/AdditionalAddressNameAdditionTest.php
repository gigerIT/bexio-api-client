<?php

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Support\Data\SearchCriteria;
use Illuminate\Support\Str;

it('creates updates and searches a disposable address with a name addition', function () {
    $client = testClient();
    $name = 'API sync ' . Str::uuid();
    $contact = (new Contact(name_1: $name))->attachClient($client)->save();
    $address = null;

    try {
        $address = (new AdditionalAddress(
            contact_id: $contact->id,
            name: $name,
            street_name: 'Teststrasse',
            house_number: '10',
            postcode: '8000',
            city: 'Zurich',
            name_addition: 'Receiving department',
        ))->attachClient($client)->save();

        expect($address->name_addition)->toBe('Receiving department');

        $address->name_addition = 'Accounts department';
        $address = $address->save();

        expect($address->contact_id)->toBe($contact->id)
            ->and($address->refresh()->name_addition)->toBe('Accounts department');

        $matches = AdditionalAddress::useClient($client)->query()
            ->forContact($contact->id)
            ->where('name', SearchCriteria::EQUAL, $name)
            ->get();

        expect($matches)->toHaveCount(1)
            ->and($matches[0]->name_addition)->toBe('Accounts department')
            ->and($matches[0]->contact_id)->toBe($contact->id);
    } finally {
        try {
            $address?->delete();
        } finally {
            $contact->delete();
        }
    }
});
