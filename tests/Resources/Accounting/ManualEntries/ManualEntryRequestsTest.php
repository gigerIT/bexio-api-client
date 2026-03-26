<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use PHPUnit\Framework\Assert;

it('can get Manual Entries', function () {
    $entries = ManualEntry::useClient(testClient())->all();

    if (count($entries) === 0) {
        Assert::markTestSkipped('No manual entries available');
    }

    expect($entries)->toBeArray()
        ->and($entries[0])->toBeInstanceOf(ManualEntry::class)
        ->and($entries[0]->id)->toBeInt();
});

it('can get a Manual Entry', function () {
    $entries = ManualEntry::useClient(testClient())->all();
    if (count($entries) === 0) {
        Assert::markTestSkipped('No manual entries available');
    }

    $entry = ManualEntry::useClient(testClient())->find($entries[0]->uuid ?? $entries[0]->id);

    expect($entry)->toBeInstanceOf(ManualEntry::class)
        ->and($entry->id)->toBeInt();
});

it('can get first Manual Entry using query builder', function () {
    $entry = ManualEntry::useClient(testClient())->query()->first();

    if (! $entry) {
        Assert::markTestSkipped('No manual entries available');
    }

    expect($entry)->toBeInstanceOf(ManualEntry::class)
        ->and($entry->id)->toBeInt();
});
