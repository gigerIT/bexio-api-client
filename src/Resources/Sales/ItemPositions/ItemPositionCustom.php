<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionCustom extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::CUSTOM;

    public function __construct(
        public ?string $amount,
        public ?int    $unit_id,
        public ?int    $account_id,
        public ?int    $tax_id,
        public ?string $text,
        public ?string $unit_price,
        public ?string $discount_in_percent,
        public ?int    $parent_id,
    )

    {

    }
}