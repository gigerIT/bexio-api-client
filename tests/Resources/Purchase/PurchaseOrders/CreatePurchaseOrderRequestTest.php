<?php

it('can create a Purchase Order', function () {
    $purchaseOrder = new \Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder(
        contact_id: testContactId()
    );

    $purchaseOrder = $purchaseOrder->attachClient(testClient())->create();
})->skip('Not implemented yet');
