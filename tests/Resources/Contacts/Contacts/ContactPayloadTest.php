<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Contacts\Titles\Title;
use Illuminate\Support\Str;

it('round trips contact titles and reuses hydrated contacts in bulk writes', function () {
    $client = testClient();
    $title = (new Title(name: 'Sync ' . Str::random(8)))->attachClient($client)->create();
    $contacts = [];
    try {
        $contact = (new Contact(contact_type_id: ContactType::PERSON, name_1: 'Sync ' . Str::uuid(), titel_id: $title->id))
            ->attachClient($client)->create();
        $contacts[] = $contact;
        expect($contact->titel_id)->toBe($title->id);
        $contact->street_name = 'Teststrasse';
        $contact->house_number = '7';
        $contact = $contact->save();
        expect($contact->refresh()->titel_id)->toBe($title->id);

        $copy = clone $contact;
        $copy->nr = null;
        $copy->name_1 = 'Sync copy ' . Str::uuid();
        $created = Contact::bulkCreate([$copy], $client);
        foreach ($created as $entry) {
            $contacts[] = $entry->attachClient($client);
        }
        expect($created)->toHaveCount(1)
            ->and($created[0]->id)->not->toBe($contact->id)
            ->and($created[0]->titel_id)->toBe($title->id)
            ->and($created[0]->street_name)->toBe('Teststrasse');
    } finally {
        foreach ($contacts as $contact) {
            $contact->delete();
        }
        $title->delete();
    }
});
