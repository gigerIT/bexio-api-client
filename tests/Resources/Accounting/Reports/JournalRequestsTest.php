<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\ManualEntries\ManualEntry;
use Bexio\Resources\Accounting\Reports\JournalEntry;
use Bexio\Resources\Accounting\Reports\Requests\GetJournalRequest;

// The shared test account has no bookings, so each test books a disposable manual entry,
// which appears in the journal immediately and leaves it again on delete.
beforeEach(function () {
    $accounts = array_values(array_filter(
        Account::useClient(testClient())->all(),
        static fn (Account $account): bool => $account->is_active && ! $account->is_locked,
    ));

    if (count($accounts) < 3) {
        \PHPUnit\Framework\Assert::markTestSkipped('No compatible active accounts available');
    }

    [$this->debitAccount, $this->creditAccount, $this->unrelatedAccount] = $accounts;
    $this->description = 'Bexio API client journal test ' . uniqid();
    $this->manualEntry = (new ManualEntry(
        type: 'manual_single_entry',
        date: date('Y-m-d'),
        reference_nr: 'API Journal ' . uniqid(),
        entries: [[
            'debit_account_id' => $this->debitAccount->id,
            'credit_account_id' => $this->creditAccount->id,
            'description' => $this->description,
            'amount' => 1.25,
            'currency_id' => 1,
            'currency_factor' => 1,
        ]],
    ))->attachClient(testClient())->create();
});

afterEach(function () {
    ($this->manualEntry ?? null)?->attachClient(testClient())->delete();
});

it('can get Journal entries', function () {
    $entries = JournalEntry::useClient(testClient())->query()->limit(2)->get();

    expect($entries)->toBeArray()->not->toBeEmpty()
        ->and($entries[0])->toBeInstanceOf(JournalEntry::class)
        ->and($entries[0]->currency_id)->toBeInt()
        ->and($entries[0]->currency_factor)->toBeFloat()
        ->and($entries[0]->base_currency_amount)->toBeFloat();
});

it('can get first Journal entry using query builder', function () {
    $entry = JournalEntry::useClient(testClient())->query()->limit(1)->first();

    expect($entry)->toBeInstanceOf(JournalEntry::class);
});

it('filters the Journal by account and date and keeps its references and currency amounts', function () {
    $date = $this->manualEntry->date;
    $request = new GetJournalRequest(from: $date, to: $date, account_uuid: $this->debitAccount->uuid);
    $response = testClient()->send($request);
    $payload = $response->json();
    $index = array_search($this->description, array_column($payload, 'description'), true);

    expect($index)->toBeInt();

    $entry = $request->createDtoFromResponse($response)[$index];
    $row = $payload[$index];

    expect($entry)->toBeInstanceOf(JournalEntry::class)
        ->and($entry->amount)->toBe(1.25)
        ->and($entry->debit_account_id)->toBe($this->debitAccount->id)
        ->and($entry->credit_account_id)->toBe($this->creditAccount->id)
        ->and($entry->currency_id)->toBe(1);

    foreach (['currency_id', 'base_currency_id', 'currency_factor', 'base_currency_amount', 'ref_id', 'ref_class', 'ref_uuid'] as $field) {
        expect($row)->toHaveKey($field)
            ->and($entry->{$field})->toEqual($row[$field]);
    }

    $descriptions = static fn (GetJournalRequest $request): array => array_column(testClient()->send($request)->json(), 'description');
    $nextDay = date('Y-m-d', strtotime($date . ' +1 day'));
    $previousDay = date('Y-m-d', strtotime($date . ' -1 day'));

    expect($descriptions(new GetJournalRequest(from: $nextDay, account_uuid: $this->debitAccount->uuid)))->not->toContain($this->description)
        ->and($descriptions(new GetJournalRequest(to: $previousDay, account_uuid: $this->debitAccount->uuid)))->not->toContain($this->description)
        ->and($descriptions(new GetJournalRequest(from: $date, to: $date, account_uuid: $this->unrelatedAccount->uuid)))->not->toContain($this->description);
});
