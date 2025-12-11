<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Resources\Resource;

class PaymentRecipientAddress extends Resource
{
    public function __construct(
        public ?string $street_name = null,
        public ?string $house_number = null,
        public ?string $zip = null,
        public ?string $city = null,
        public ?string $country_code = null,
    ) {
    }
}



