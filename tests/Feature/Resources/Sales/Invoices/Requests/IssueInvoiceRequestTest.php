<?php

use Bexio\Resources\Sales\Invoices\Invoice;

it('can issue an invoice', function () {
    $response = Invoice::useClient(testClient())->issue(1);

    expect($response->successful())->toBeTrue();
});

it('can revert an issued invoice', function () {
    $response = Invoice::useClient(testClient())->revertIssue(1);

    expect($response->successful())->toBeTrue();
});
