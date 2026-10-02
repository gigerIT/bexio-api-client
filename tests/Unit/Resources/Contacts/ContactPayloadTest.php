<?php

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Requests\BulkCreateContactsRequest;
use Bexio\Resources\Contacts\Contacts\Requests\CreateContactRequest;
use Bexio\Resources\Contacts\Contacts\Requests\UpdateContactRequest;

it('accepts both title response spellings without changing the write field', function (string $field) {
    $contact = Contact::from(['name_1' => 'Example', $field => 9]);

    expect($contact->titel_id)->toBe(9)
        ->and($contact->toApi()['titel_id'])->toBe(9)
        ->and($contact->toApi())->not->toHaveKey('title_id');
})->with(['title_id', 'titel_id']);

it('uses the same writable contact body for create update and bulk', function () {
    $contact = Contact::from([
        'id' => 42, 'name_1' => 'Example', 'title_id' => 9,
        'updated_at' => '2026-10-01 12:00:00', 'profile_image' => 'avatar.png',
        'address' => 'Old street 2', 'is_lead' => false,
        'street_name' => 'New street', 'house_number' => '3',
    ]);
    $expected = (new Contact(name_1: 'Example', titel_id: 9, street_name: 'New street', house_number: '3'))->toArray();
    unset($expected['id'], $expected['is_lead']);

    $create = new CreateContactRequest($contact);
    $update = new UpdateContactRequest($contact);
    $bulk = new BulkCreateContactsRequest([$contact]);

    expect($create->resolveEndpoint())->toBe('/2.0/contact')
        ->and($update->resolveEndpoint())->toBe('/2.0/contact/42')
        ->and($bulk->resolveEndpoint())->toBe('/2.0/contact/_bulk_create')
        ->and($create->body()->all())->toBe($expected)
        ->and($update->body()->all())->toBe($expected)
        ->and($bulk->body()->all())->toBe([$expected]);
});
