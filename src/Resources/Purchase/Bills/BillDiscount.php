<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Resource;

class BillDiscount extends Resource
{
    public function __construct(
        public int   $position,
        public float $amount,
    )
    {
    }
}