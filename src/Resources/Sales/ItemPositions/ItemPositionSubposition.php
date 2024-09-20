<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\Requests\CreateItemSubPositionRequest;

class ItemPositionSubposition extends ItemPosition
{
    const CREATE_REQUEST = CreateItemSubPositionRequest::class;

    const CAN_BE_ATTACHED = false;


    public ItemPositionType $type = ItemPositionType::SUBPOSITION;

    public function __construct(
        public ?string $text,
        public bool   $show_pos_nr = true,
    )

    {

    }
}