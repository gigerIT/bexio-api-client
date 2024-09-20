<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionCustom extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::CUSTOM;



    public function __construct(
        public int     $tax_id,

        public ?string $amount = null,
        public ?int    $unit_id = null,
        public ?int    $account_id = null,
        public ?string $text = null,
        public ?string $unit_price = null,
        public ?string $discount_in_percent = null,
    )

    {

    }
}