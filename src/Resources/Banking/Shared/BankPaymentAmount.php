<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\Shared;

use Bexio\Resources\Resource;

class BankPaymentAmount extends Resource
{
    public function __construct(
        public ?string $currency = null,
        public float|int|string|null $amount = null,
    ) {}
}
