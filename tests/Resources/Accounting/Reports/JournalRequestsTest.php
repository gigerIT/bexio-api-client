<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Reports\JournalEntry;

it('can get Journal entries', function () {
    try {
        $entries = JournalEntry::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Journal endpoint not available: ' . $e->getMessage());
    }

    if (empty($entries)) {
        \PHPUnit\Framework\Assert::markTestSkipped('No journal entries available');
    }

    expect($entries)->toBeArray()
        ->and($entries[0])->toBeInstanceOf(JournalEntry::class);
});

it('can get first Journal entry using query builder', function () {
    try {
        $entry = JournalEntry::useClient(testClient())->query()->first();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Journal endpoint not available: ' . $e->getMessage());
    }

    if (!$entry) {
        \PHPUnit\Framework\Assert::markTestSkipped('No journal entries available');
    }

    expect($entry)->toBeInstanceOf(JournalEntry::class);
});

