<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionText extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::TEXT;

    public ?int $parent_id;

    public function __construct(
        public ?string $text,
        public ?bool   $show_pos_nr,
    )

    {

    }
}