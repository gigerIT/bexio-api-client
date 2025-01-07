<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\BexioClient;
use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\Taxes\Tax;


it('can get Accounts', function () {
    $accounts = Account::useClient(testClient())->all();

    expect($accounts)->toBeArray()
        ->and($accounts[0])->toBeInstanceOf(Account::class)
        ->and($accounts[0]->id)->toBeInt();


});

