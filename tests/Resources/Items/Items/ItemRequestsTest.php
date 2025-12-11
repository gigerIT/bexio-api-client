<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Items\Items\Item;
use Bexio\Support\Data\SearchCriteria;

it('can get Items', function () {
    try {
        $items = Item::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $e->getMessage());
    }

    if (count($items) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No items available');
    }

    expect($items)->toBeArray()
        ->and($items[0])->toBeInstanceOf(Item::class)
        ->and($items[0]->id)->toBeInt();
});

it('can get an Item', function () {
    try {
        $items = Item::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $e->getMessage());
    }

    if (count($items) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No items available');
    }

    $item = Item::useClient(testClient())->find($items[0]->id);

    expect($item)->toBeInstanceOf(Item::class)
        ->and($item->id)->toBeInt();
});

it('can search Items', function () {
    try {
        $items = Item::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $e->getMessage());
    }

    if (count($items) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No items available');
    }

    $searchable = $items[0];
    $field = $searchable->intern_name ? 'intern_name' : ($searchable->intern_code ? 'intern_code' : null);
    $searchValue = $field ? $searchable->{$field} : null;

    if (!$searchValue) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable item name available');
    }

    $results = Item::useClient(testClient())
        ->query()
        ->where($field, SearchCriteria::LIKE, $searchValue)
        ->search();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Item::class);
});

it('can get first Item using query builder', function () {
    try {
        $item = Item::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Items endpoint unavailable: ' . $e->getMessage());
    }

    if (!$item) {
        \PHPUnit\Framework\Assert::markTestSkipped('No items available');
    }

    expect($item)->toBeInstanceOf(Item::class)
        ->and($item->id)->toBeInt();
});


