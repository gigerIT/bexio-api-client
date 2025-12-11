<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Shared;

use Bexio\Resources\Resource;

class BankPaymentRecipient extends Resource
{
    public function __construct(
        public ?string $name = null,
        public ?string $street = null,
        public string|int|null $zip = null,
        public ?string $city = null,
        public ?string $country_code = null,
        public string|int|null $house_number = null,
    ) {
    }
}



