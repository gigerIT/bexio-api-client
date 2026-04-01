<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Support\Data\SearchCriteria;


it('can get Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    expect($accounts)->toBeArray()
        ->and($accounts[0])->toBeInstanceOf(Account::class)
        ->and($accounts[0]->id)->toBeInt();
});

it('can search Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    if (count($accounts) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No accounts available');
    }

    $searchable = collect($accounts)->first(fn (Account $account): bool => filled($account->account_no));

    if (! $searchable) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable account available');
    }

    $results = Account::useClient(testClient())
        ->query()
        ->where('account_no', SearchCriteria::EQUAL, $searchable->account_no)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Account::class);
});

it('can get first Account using query builder', function () {
    $account = Account::useClient(testClient())->query()->first();

    expect($account)->toBeInstanceOf(Account::class)
        ->and($account->id)->toBeInt();
});

