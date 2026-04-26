<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Countries\Country;
use Bexio\Resources\Other\Countries\Requests\CreateCountryRequest;
use Bexio\Resources\Other\Countries\Requests\DeleteCountryRequest;
use Bexio\Resources\Other\Countries\Requests\UpdateCountryRequest;
use Bexio\Support\Data\SearchCriteria;

it('can get Countries', function () {
    $countries = Country::useClient(testClient())->all();

    expect($countries)->toBeArray()
        ->and($countries[0])->toBeInstanceOf(Country::class)
        ->and($countries[0]->id)->toBeInt();
});

it('can get a Country', function () {
    $country = Country::useClient(testClient())->find(1);

    expect($country)->toBeInstanceOf(Country::class)
        ->and($country->id)->toBeInt()
        ->and($country->name)->toBeString();
});

it('can search Countries', function () {
    try {
        $countries = Country::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Countries endpoint unavailable: ' . $e->getMessage());
    }

    if (count($countries) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No countries available');
    }

    $searchable = $countries[0];

    if (! $searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable country available');
    }

    $results = Country::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Country::class);
});

it('can get first Country using query builder', function () {
    $country = Country::useClient(testClient())->query()->first();

    expect($country)->toBeInstanceOf(Country::class)
        ->and($country->id)->toBeInt();
});

it('builds country write requests', function () {
    $country = new Country(
        id: 123,
        name: 'Codex Test Country',
        name_short: 'TC',
        iso3166_alpha2: 'CH',
    );

    expect((new CreateCountryRequest($country))->resolveEndpoint())
        ->toBe('/2.0/country')
        ->and((new UpdateCountryRequest($country))->resolveEndpoint())
        ->toBe('/2.0/country/123')
        ->and((new DeleteCountryRequest(123))->resolveEndpoint())
        ->toBe('/2.0/country/123');

    $body = new \ReflectionMethod(CreateCountryRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreateCountryRequest($country)))
        ->toBe([
            'name' => 'Codex Test Country',
            'name_short' => 'TC',
            'iso3166_alpha2' => 'CH',
        ]);
});

it('can create update and delete a disposable Country', function () {
    $country = (new Country(
        name: 'API Country ' . uniqid(),
        name_short: 'TC',
        iso3166_alpha2: 'CH',
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $country->name .= ' updated';
        $country->iso3166_alpha2 = 'CH';
        $updated = $country->update();

        expect($updated)->toBeInstanceOf(Country::class)
            ->and($updated->name)->toBe($country->name);
    } finally {
        $country->delete();
    }
});
