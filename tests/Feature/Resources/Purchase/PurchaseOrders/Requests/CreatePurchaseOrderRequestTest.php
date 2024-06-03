<?php

it('can create a Purchase Order', function () {
    $purchaseOrder = new \Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder(
        contact_id: testContactId()
    );

    $purchaseOrder = $purchaseOrder->attachClient(testClientDebug())->create();
});
