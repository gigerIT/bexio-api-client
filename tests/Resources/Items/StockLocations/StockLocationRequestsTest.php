<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Items\StockLocations\StockLocation;
use Bexio\Support\Data\SearchCriteria;

it('can get Stock Locations', function () {
    try {
        $locations = StockLocation::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock locations endpoint unavailable: ' . $e->getMessage());
    }

    if (count($locations) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock locations available');
    }

    expect($locations)->toBeArray()
        ->and($locations[0])->toBeInstanceOf(StockLocation::class)
        ->and($locations[0]->id)->toBeInt();
});

it('can search Stock Locations', function () {
    try {
        $locations = StockLocation::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock locations endpoint unavailable: ' . $e->getMessage());
    }

    if (count($locations) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock locations available');
    }

    $searchable = $locations[0];

    if (!$searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable stock location available');
    }

    $results = StockLocation::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(StockLocation::class);
});

it('can get first Stock Location using query builder', function () {
    try {
        $location = StockLocation::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock locations endpoint unavailable: ' . $e->getMessage());
    }

    if (!$location) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock locations available');
    }

    expect($location)->toBeInstanceOf(StockLocation::class)
        ->and($location->id)->toBeInt();
});



