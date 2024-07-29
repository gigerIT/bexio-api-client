<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales;

use Bexio\Resources\Resource;

class SalesTax extends Resource
{
    public function __construct(
        public string $percentage,
        public ?string $name,
    )
    {
    }
}