<?php

namespace Bexio\Resources\Contacts\AdditionalAddresses\Requests;

use Bexio\Resources\Contacts\AdditionalAddresses\AdditionalAddress;
use Bexio\Support\Data\SearchCriteria;
use function Pest\Faker\fake;

$testAddress = null;

it('can create an AdditionalAddress', function () use (&$testAddress) {
    $address = new AdditionalAddress(
        contact_id: testContactId(),
        name: fake()->word(),
        street_name: fake()->streetName(),
        house_number: fake()->buildingNumber(),
        postcode: fake()->postcode(),
        city: fake()->city(),
        subject: fake()->sentence(),
    );

    $testAddress = $address->attachClient(testClient())->save();

    expect($testAddress)->toBeInstanceOf(AdditionalAddress::class)
        ->and($testAddress->name)->toBeString()
        ->and($testAddress->id)->toBeInt();
});


it('can get AdditionalAddresses', function () {
    $addresses = AdditionalAddress::useClient(testClient())
        ->query()
        ->forContact(testContactId())
        ->get();

    expect($addresses)->toBeArray();
});


it('can get AdditionalAddresses using query builder', function () {
    $addresses = AdditionalAddress::useClient(testClient())
        ->query()
        ->forContact(testContactId())
        ->limit(5)
        ->get();

    expect($addresses)->toBeArray()
        ->and(count($addresses))->toBeLessThanOrEqual(5);
});


it('can get first AdditionalAddress using query builder', function () use (&$testAddress) {
    $address = AdditionalAddress::useClient(testClient())
        ->query()
        ->forContact(testContactId())
        ->first();

    if ($address === null) {
        $this->markTestSkipped('No additional addresses available');
    }

    expect($address)->toBeInstanceOf(AdditionalAddress::class);
})->depends('it can create an AdditionalAddress');


it('can get an AdditionalAddress', function () use (&$testAddress) {
    // Create an instance with contact_id to use find()
    $addressFinder = new AdditionalAddress(
        id: null,
        contact_id: testContactId()
    );
    $address = $addressFinder->attachClient(testClient())->find($testAddress->id);

    expect($address)->toBeInstanceOf(AdditionalAddress::class)
        ->and($address->name)->toBeString()
        ->and($address->id)->toBeInt();
})->depends('it can create an AdditionalAddress');


it('can search AdditionalAddresses', function () use (&$testAddress) {
    $addresses = AdditionalAddress::useClient(testClient())
        ->query()
        ->forContact(testContactId())
        ->where('name', SearchCriteria::LIKE, $testAddress->name)
        ->get();

    expect($addresses)->toBeArray();
})->depends('it can create an AdditionalAddress');


it('can update an AdditionalAddress', function () use (&$testAddress) {
    $testAddress->name = fake()->word();

    $testAddress->save();

    expect($testAddress->name)->toBeString();
})->depends('it can get an AdditionalAddress');


it('can delete an AdditionalAddress', function () use (&$testAddress) {
    expect($testAddress->delete())->toBeTrue();
})->depends('it can create an AdditionalAddress');

