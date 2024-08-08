<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionSubposition extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::SUBPOSITION;

    public function __construct(
        public ?string $text,
        public bool   $show_pos_nr = true,
    )

    {

    }
}