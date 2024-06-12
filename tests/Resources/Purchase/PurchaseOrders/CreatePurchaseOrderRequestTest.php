<?php

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;

it('can create a Purchase Order', function () {
    $purchaseOrder = new PurchaseOrder(
        contact_id: testContactId()
    );

    $purchaseOrder = $purchaseOrder->attachClient(testClient())->create();
})->skip('Not implemented yet');
