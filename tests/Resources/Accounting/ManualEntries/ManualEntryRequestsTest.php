<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use LogicException;

it('can get Manual Entries', function () {
    $entries = ManualEntry::useClient(testClient())->all();

    if (count($entries) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No manual entries available');
    }

    expect($entries)->toBeArray()
        ->and($entries[0])->toBeInstanceOf(ManualEntry::class)
        ->and($entries[0]->id)->toBeInt();
});

it('does not expose unsupported Manual Entry show operations', function () {
    $resource = ManualEntry::useClient(testClient());

    expect(fn () => $resource->find(1))
        ->toThrow(LogicException::class, 'Manual entries do not support direct show requests.');

    expect(fn () => (new ManualEntry(id: 1))->attachClient(testClient())->refresh())
        ->toThrow(LogicException::class, 'Manual entries do not support direct show requests.');
});

it('can get first Manual Entry using query builder', function () {
    $entry = ManualEntry::useClient(testClient())->query()->first();

    if (!$entry) {
        \PHPUnit\Framework\Assert::markTestSkipped('No manual entries available');
    }

    expect($entry)->toBeInstanceOf(ManualEntry::class)
        ->and($entry->id)->toBeInt();
});

