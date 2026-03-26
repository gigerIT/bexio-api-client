<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionDiscount extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::DISCOUNT;

    public ?string $discount_total;

    public function __construct(
        public ?string $text,
        public ?bool $is_percentual,
        public ?string $value,
    ) {
    }
}
