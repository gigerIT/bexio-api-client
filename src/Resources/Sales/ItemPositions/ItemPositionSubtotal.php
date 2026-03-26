<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionSubtotal extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::SUBTOTAL;

    public ?string $value;

    public function __construct(
        public ?string $text,
    ) {
    }
}
