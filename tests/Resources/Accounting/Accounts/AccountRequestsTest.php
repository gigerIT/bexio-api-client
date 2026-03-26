<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Accounts\Account;

it('can get Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    expect($accounts)->toBeArray()
        ->and($accounts[0])->toBeInstanceOf(Account::class)
        ->and($accounts[0]->id)->toBeInt();

});
