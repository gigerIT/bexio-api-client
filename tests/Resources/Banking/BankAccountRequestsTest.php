<?php

namespace Bexio\Resources\Banking;

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use PHPUnit\Framework\Assert;

it('can get Bank Accounts', function () {
    try {
        $accounts = BankAccount::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Bank accounts endpoint unavailable: '.$e->getMessage());
    }

    if (empty($accounts)) {
        Assert::markTestSkipped('No bank accounts available');
    }

    expect($accounts)->toBeArray()
        ->and($accounts[0])->toBeInstanceOf(BankAccount::class)
        ->and($accounts[0]->id)->not->toBeNull();
});

it('can get a Bank Account', function () {
    try {
        $accounts = BankAccount::useClient(testClient())->all();
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Bank accounts endpoint unavailable: '.$e->getMessage());
    }

    if (empty($accounts)) {
        Assert::markTestSkipped('No bank accounts available');
    }

    $account = BankAccount::useClient(testClient())->find($accounts[0]->id);

    expect($account)->toBeInstanceOf(BankAccount::class)
        ->and($account->id)->toBeInt();
});
