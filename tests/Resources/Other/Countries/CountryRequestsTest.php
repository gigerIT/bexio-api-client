<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Countries\Country;

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

it('can get first Country using query builder', function () {
    $country = Country::useClient(testClient())->query()->first();

    expect($country)->toBeInstanceOf(Country::class)
        ->and($country->id)->toBeInt();
});

