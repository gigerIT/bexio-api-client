<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Purchase\Bills\Enums\BillAddressType;
use Bexio\Resources\Resource;

class BillAddress extends Resource
{
    public function __construct(
        public ?string         $title = null,
        public ?string         $salutation = null,
        public ?string         $firstname_suffix = null,
        public string          $lastname_company,
        public ?string         $address_line = null,
        public ?string         $postcode = null,
        public ?string         $city = null,
        public ?string         $country_code = null,
        public ?int            $main_contact_id = null,
        public ?int            $contact_address_id = null,
        public BillAddressType $type = BillAddressType::COMPANY
    )
    {
    }
}