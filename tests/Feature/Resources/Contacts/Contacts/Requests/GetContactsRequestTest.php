<?php

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use function Pest\Faker\fake;

it('can get a contact', function () {
    $request = new GetContactsRequest();

    $response = testClient()->send($request);

    $contacts = $request->createDtoFromResponse($response);

    expect($contacts)->toBeArray()
        ->and($contacts[0])->toBeInstanceOf(Contact::class)
        ->and($contacts[0]->name_1)->toBeString()->and($contacts[0]->id)->toBeInt();
});