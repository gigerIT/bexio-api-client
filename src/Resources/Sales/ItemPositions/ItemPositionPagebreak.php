<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionPagebreak extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::PAGEBREAK;

    public function __construct(
        public bool $pagebreak = true,
    ) {
    }
}
