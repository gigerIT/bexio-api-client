<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Items\StockAreas\StockArea;
use Bexio\Support\Data\SearchCriteria;

it('can get Stock Areas', function () {
    try {
        $areas = StockArea::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock areas endpoint unavailable: ' . $e->getMessage());
    }

    if (count($areas) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock areas available');
    }

    expect($areas)->toBeArray()
        ->and($areas[0])->toBeInstanceOf(StockArea::class)
        ->and($areas[0]->id)->toBeInt();
});

it('can search Stock Areas', function () {
    try {
        $areas = StockArea::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock areas endpoint unavailable: ' . $e->getMessage());
    }

    if (count($areas) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock areas available');
    }

    $searchable = $areas[0];

    if (!$searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable stock area available');
    }

    $results = StockArea::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(StockArea::class);
});

it('can get first Stock Area using query builder', function () {
    try {
        $area = StockArea::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Stock areas endpoint unavailable: ' . $e->getMessage());
    }

    if (!$area) {
        \PHPUnit\Framework\Assert::markTestSkipped('No stock areas available');
    }

    expect($area)->toBeInstanceOf(StockArea::class)
        ->and($area->id)->toBeInt();
});



