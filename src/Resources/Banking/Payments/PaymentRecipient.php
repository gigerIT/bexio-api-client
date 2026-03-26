<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Resources\Resource;

class PaymentRecipient extends Resource
{
    public function __construct(
        public ?string $name = null,
        public ?string $iban = null,
        public ?PaymentRecipientAddress $address = null,
    ) {}
}
