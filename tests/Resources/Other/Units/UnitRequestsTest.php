<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Units\Unit;
use Bexio\Support\Data\SearchCriteria;

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

it('can search Units', function () {
    try {
        $units = Unit::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Units endpoint unavailable: ' . $e->getMessage());
    }

    if (count($units) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No units available');
    }

    $searchable = $units[0];

    if (! $searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable unit available');
    }

    $results = Unit::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Unit::class);
});

it('can get first Unit using query builder', function () {
    $unit = Unit::useClient(testClient())->query()->first();

    expect($unit)->toBeInstanceOf(Unit::class)
        ->and($unit->id)->toBeInt();
});

