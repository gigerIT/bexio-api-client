<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Units\Unit;

it('can get Units', function () {
    $units = Unit::useClient(testClient())->all();

    expect($units)->toBeArray()
        ->and($units[0])->toBeInstanceOf(Unit::class)
        ->and($units[0]->id)->toBeInt();
});

it('can get a Unit', function () {
    $unit = Unit::useClient(testClient())->find(1);

    expect($unit)->toBeInstanceOf(Unit::class)
        ->and($unit->id)->toBeInt()
        ->and($unit->name)->toBeString();
});

it('can get first Unit using query builder', function () {
    $unit = Unit::useClient(testClient())->query()->first();

    expect($unit)->toBeInstanceOf(Unit::class)
        ->and($unit->id)->toBeInt();
});
