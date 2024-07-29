<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Resources\Accounting\Taxes\Tax;


it('can get Accounts', function () {
    $taxes = Account::useClient(testClient())->all();

    expect($taxes)->toBeArray()
        ->and($taxes[0])->toBeInstanceOf(Account::class)
        ->and($taxes[0]->id)->toBeInt();
});

