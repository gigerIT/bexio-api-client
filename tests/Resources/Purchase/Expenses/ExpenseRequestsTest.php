<?php

use Bexio\Resources\Purchase\Expenses\Expense;

it('can validate an Expense document number', function () {
    $documentNumber = 'EX-' . date('YmdHis') . '-' . random_int(1000, 9999);

    $validation = Expense::useClient(testClient())->validateDocumentNumber($documentNumber);

    expect($validation)->toBeArray()
        ->and($validation)->toHaveKey('valid')
        ->and($validation['valid'])->toBeBool();
});
