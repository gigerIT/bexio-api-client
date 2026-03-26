<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Resources\Resource;

class PurchasePaymentReference extends Resource
{
    public function __construct(
        public ?string $bill_id = null,
        public ?string $bill_payment_id = null,
    ) {}
}
