<?php

use Bexio\Resources\Purchase\Expenses\Expense;
use Tests\Support\LiveApiContracts;

it('can validate an Expense document number', function () {
    $documentNumber = 'EX-' . date('YmdHis') . '-' . random_int(1000, 9999);

    $validation = Expense::useClient(testClient())->validateDocumentNumber($documentNumber);

    expect($validation)->toBeArray()
        ->and($validation)->toHaveKey('valid')
        ->and($validation['valid'])->toBeBool();
});

it('can get an indexed Expense', function () {
    $client = testClient();
    $expenses = Expense::useClient($client)->query()->limit(20)->get();

    $expense = LiveApiContracts::assertFirstIndexedCandidateCanBeShown(
        client: $client,
        resourceClass: Expense::class,
        candidates: $expenses,
        identifier: static fn (Expense $expense): ?string => $expense->id,
        emptyMessage: 'No expenses available',
        unretrievableMessage: 'No retrievable expenses available',
    );

    expect($expense)->toBeInstanceOf(Expense::class)
        ->and($expense->id)->toBeString();
});
