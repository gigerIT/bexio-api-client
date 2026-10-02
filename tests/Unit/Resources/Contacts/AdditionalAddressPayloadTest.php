<?php

use Bexio\BexioClient;
use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\CreateAdditionalAddressRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\SearchAdditionalAddressRequest;
use Bexio\Resources\Contacts\AdditionalAddresses\Requests\UpdateAdditionalAddressRequest;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('preserves name additions and contact context through address writes', function (string $requestClass, string $endpoint) {
    $payload = [
        'id' => 7,
        'name' => 'Warehouse',
        'name_addition' => 'Receiving department',
        'street_name' => 'Industriestrasse',
        'house_number' => '10',
        'address' => 'Industriestrasse 10',
    ];
    $address = AdditionalAddress::from([...$payload, 'contact_id' => 42]);
    $mock = new MockClient([$requestClass => MockResponse::make($payload)]);
    $client = (new BexioClient('mock-token'))->withMockClient($mock);
    $request = new $requestClass($address);
    $saved = $request->createDtoFromResponse($client->send($request));

    expect($saved->name_addition)->toBe('Receiving department')
        ->and($saved->contact_id)->toBe(42);

    $mock->assertSent(fn ($sent): bool =>
        $sent->getMethod() === Method::POST
        && $sent->resolveEndpoint() === $endpoint
        && $sent->body()->all() === [
            'name' => 'Warehouse',
            'street_name' => 'Industriestrasse',
            'house_number' => '10',
            'address_addition' => null,
            'postcode' => null,
            'city' => null,
            'country_id' => null,
            'subject' => null,
            'description' => null,
            'name_addition' => 'Receiving department',
        ]
    );
})->with([
    'create' => [CreateAdditionalAddressRequest::class, '/2.0/contact/42/additional_address'],
    'update' => [UpdateAdditionalAddressRequest::class, '/2.0/contact/42/additional_address/7'],
]);

it('preserves the contact context of searched additional addresses', function () {
    $client = (new BexioClient('mock-token'))->withMockClient(new MockClient([
        SearchAdditionalAddressRequest::class => MockResponse::make([
            ['id' => 7, 'name' => 'Warehouse', 'name_addition' => null],
        ]),
    ]));
    $request = new SearchAdditionalAddressRequest(42);
    $addresses = $request->createDtoFromResponse($client->send($request));

    expect($addresses[0]->contact_id)->toBe(42)
        ->and($addresses[0]->name_addition)->toBeNull();
});
