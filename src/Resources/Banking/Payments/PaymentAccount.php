<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Resources\Resource;

class PaymentAccount extends Resource
{
    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $iban = null,
    ) {}
}
