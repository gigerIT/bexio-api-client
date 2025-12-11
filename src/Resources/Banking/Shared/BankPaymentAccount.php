<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Shared;

use Bexio\Resources\Resource;

class BankPaymentAccount extends Resource
{
    public function __construct(
        public ?int $id = null,
        public ?string $iban = null,
    ) {
    }
}


