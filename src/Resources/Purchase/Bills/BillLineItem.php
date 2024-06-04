<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Resource;

class BillLineItem extends Resource
{
    public function __construct(
        public float $amount,
        public int   $position = 0,
        public ?string $title = null,
        public ?int    $tax_id = null,
        public ?int    $booking_account_id = null,
    )
    {
    }
}