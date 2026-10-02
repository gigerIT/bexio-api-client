<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Reports\JournalEntry;

it('can get Journal entries', function () {
    $entries = JournalEntry::useClient(testClient())->query()->limit(2)->get();

    if (empty($entries)) {
        \PHPUnit\Framework\Assert::markTestSkipped('No journal entries available');
    }

    expect($entries)->toBeArray()
        ->and($entries[0])->toBeInstanceOf(JournalEntry::class)
        ->and($entries[0]->currency_id)->toBeInt()
        ->and($entries[0]->currency_factor)->toBeFloat()
        ->and($entries[0]->base_currency_amount)->toBeFloat();
});

it('can get first Journal entry using query builder', function () {
    $entry = JournalEntry::useClient(testClient())->query()->limit(1)->first();

    if (!$entry) {
        \PHPUnit\Framework\Assert::markTestSkipped('No journal entries available');
    }

    expect($entry)->toBeInstanceOf(JournalEntry::class);
});
