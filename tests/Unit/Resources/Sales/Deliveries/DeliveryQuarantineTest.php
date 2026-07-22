<?php

use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasPositions;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasSubItemPositions;
use Bexio\Resources\Sales\KbDocumentContract;

it('does not advertise nested comment or item-position APIs on Delivery', function () {
    $traits = class_uses_recursive(Delivery::class);

    expect($traits)->not->toHaveKey(HasComments::class)
        ->and($traits)->not->toHaveKey(HasPositions::class)
        ->and($traits)->not->toHaveKey(HasSubItemPositions::class)
        ->and(is_subclass_of(Delivery::class, KbDocumentContract::class))->toBeFalse()
        ->and(defined(Delivery::class.'::DOCUMENT_TYPE'))->toBeFalse()
        ->and(method_exists(Delivery::class, 'comments'))->toBeFalse()
        ->and(method_exists(Delivery::class, 'positionsByType'))->toBeFalse();
});
