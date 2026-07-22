<?php

use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Requests\SearchContactRequest;
use Bexio\Support\Data\SearchCriteria;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request as SaloonRequest;

it('forwards show_archived on contact search queries', function () {
    $mockClient = new MockClient([
        SearchContactRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Contact::useClient($client)
        ->query()
        ->withArchived()
        ->where('name_1', SearchCriteria::LIKE, 'Test')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof SearchContactRequest
            && $request->query()->get('show_archived') === true;
    });
});

it('omits show_archived on contact search when withArchived is not used', function () {
    $mockClient = new MockClient([
        SearchContactRequest::class => MockResponse::make([]),
    ]);

    $client = (new BexioClient('mock-token'))->withMockClient($mockClient);

    Contact::useClient($client)
        ->query()
        ->where('name_1', SearchCriteria::LIKE, 'Test')
        ->get();

    $mockClient->assertSent(function (SaloonRequest $request): bool {
        return $request instanceof SearchContactRequest
            && ! array_key_exists('show_archived', $request->query()->all());
    });
});
