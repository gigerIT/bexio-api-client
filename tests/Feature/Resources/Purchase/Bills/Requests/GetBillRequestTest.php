<?php

use Bexio\Resources\Purchase\Bills\Bill;

it('can get a Bill', function () {
    $bill = Bill::useClient(testClient())->find('0933d1a1-0632-4c82-a315-e3918539633a');

    expect($bill)->toBeInstanceOf(Bill::class);

//    dump($bill);
});