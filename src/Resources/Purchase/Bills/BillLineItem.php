<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Resource;

class BillLineItem extends Resource
{
    /**
     * position
     * required
     * integer <int32>
     * title
     * string [ 1 .. 80 ] characters
     * tax_id
     * integer <int32>
     * amount
     * required
     * number <double>
     * Maximum of 17 digits and maximum of 2 decimal digits.
     *
     * booking_account_id
     * integer <int32>
     */
    public function __construct(
        public int     $position,
        public ?string $title = null,
        public ?int    $tax_id = null,
        public float   $amount,
        public ?int    $booking_account_id = null,
    )
    {
    }
}