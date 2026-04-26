<?php

use Bexio\Resources\Purchase\PurchaseOrders\PurchaseOrder;
use Saloon\Exceptions\Request\RequestException;

it('can create a Purchase Order', function () {
    $client = testClient();
    $createdPurchaseOrder = null;
    $title = 'API purchase order ' . uniqid();

    try {
        $createdPurchaseOrder = (new PurchaseOrder(
            contact_id: testContactId(),
            title: $title,
            is_valid_from: now()->toDateString(),
            is_valid_to: now()->addDays(14)->toDateString(),
        ))
            ->attachClient($client)
            ->create();

        expect($createdPurchaseOrder)->toBeInstanceOf(PurchaseOrder::class)
            ->and($createdPurchaseOrder->id)->toBeInt()
            ->and($createdPurchaseOrder->contact_id)->toBe(testContactId())
            ->and($createdPurchaseOrder->title)->toBe($title);

        $fetchedPurchaseOrder = PurchaseOrder::useClient($client)->find($createdPurchaseOrder->id);

        expect($fetchedPurchaseOrder)->toBeInstanceOf(PurchaseOrder::class)
            ->and($fetchedPurchaseOrder->id)->toBe($createdPurchaseOrder->id)
            ->and($fetchedPurchaseOrder->title)->toBe($title);

        $createdPurchaseOrder->title = $title . ' updated';
        $updatedPurchaseOrder = $createdPurchaseOrder->update();

        expect($updatedPurchaseOrder)->toBeInstanceOf(PurchaseOrder::class)
            ->and($updatedPurchaseOrder->id)->toBe($createdPurchaseOrder->id)
            ->and($updatedPurchaseOrder->title)->toBe($createdPurchaseOrder->title);
    } catch (RequestException $exception) {
        if (in_array($exception->getStatus(), [402, 403, 404, 503], true)) {
            \PHPUnit\Framework\Assert::markTestSkipped(
                'Purchase order endpoint unavailable for this account: ' . $exception->getMessage()
            );
        }

        throw $exception;
    } finally {
        if ($createdPurchaseOrder?->id !== null) {
            PurchaseOrder::useClient($client)->delete($createdPurchaseOrder->id);
        }
    }
});
