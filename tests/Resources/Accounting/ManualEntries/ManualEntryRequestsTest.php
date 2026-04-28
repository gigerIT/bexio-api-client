<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Bexio\Resources\Accounting\Accounts\Account;
use Tests\Support\LiveApiContracts;

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
    LiveApiContracts::assertUnsupportedShowOperation(
        resource: ManualEntry::useClient(testClient()),
        persistedResource: (new ManualEntry(id: 1))->attachClient(testClient()),
        message: 'Manual entries do not support direct show requests.',
    );
});

it('can create update and delete a disposable Manual Entry', function () {
    $client = testClient();
    $accounts = array_values(array_filter(
        Account::useClient($client)->all(),
        static fn (Account $account): bool => $account->is_active && ! $account->is_locked,
    ));

    $debitAccount = $accounts[0] ?? null;
    $creditAccount = $accounts[1] ?? null;

    if (! $debitAccount || ! $creditAccount) {
        \PHPUnit\Framework\Assert::markTestSkipped('No compatible active accounts available');
    }

    $manualEntry = new ManualEntry(
        type: 'manual_single_entry',
        date: date('Y-m-d'),
        reference_nr: 'API Manual Entry ' . uniqid(),
        entries: [[
            'debit_account_id' => $debitAccount->id,
            'credit_account_id' => $creditAccount->id,
            'description' => 'Bexio API client live test',
            'amount' => 1.00,
            'currency_id' => 1,
            'currency_factor' => 1,
        ]],
    );

    $createdEntry = null;

    try {
        $createdEntry = $manualEntry->attachClient($client)->create();

        expect($createdEntry)->toBeInstanceOf(ManualEntry::class)
            ->and($createdEntry->id)->toBeInt()
            ->and($createdEntry->entries)->not->toBeEmpty();

        $createdEntry->reference_nr = 'Updated ' . $createdEntry->reference_nr;
        $updatedEntry = $createdEntry->attachClient($client)->update();

        expect($updatedEntry)->toBeInstanceOf(ManualEntry::class)
            ->and($updatedEntry->id)->toBe($createdEntry->id)
            ->and($updatedEntry->reference_nr)->toBe($createdEntry->reference_nr);
    } finally {
        if ($createdEntry?->id !== null) {
            $createdEntry->attachClient($client)->delete();
        }
    }
});

it('can get first Manual Entry using query builder', function () {
    $entry = ManualEntry::useClient(testClient())->query()->first();

    if (!$entry) {
        \PHPUnit\Framework\Assert::markTestSkipped('No manual entries available');
    }

    expect($entry)->toBeInstanceOf(ManualEntry::class)
        ->and($entry->id)->toBeInt();
});

