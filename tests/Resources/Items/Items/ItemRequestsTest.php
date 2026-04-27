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
        ->get();

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

it('can create, update, and delete an Item', function () {
    $client = testClient();
    $createdItem = null;
    $code = sprintf('api-test-%s', uniqid());

    try {
        $createdItem = (new Item(
            intern_code: $code,
            intern_name: 'API item payload test',
        ))
            ->attachClient($client)
            ->create();

        expect($createdItem)->toBeInstanceOf(Item::class)
            ->and($createdItem->id)->toBeInt()
            ->and($createdItem->intern_code)->toBe($code);

        $createdItem->intern_name = 'API item payload test updated';
        $updatedItem = $createdItem->attachClient($client)->update();

        expect($updatedItem)->toBeInstanceOf(Item::class)
            ->and($updatedItem->id)->toBe($createdItem->id)
            ->and($updatedItem->intern_name)->toBe('API item payload test updated');
    } finally {
        if ($createdItem?->id !== null) {
            $createdItem->attachClient($client)->delete();
        }
    }
});

