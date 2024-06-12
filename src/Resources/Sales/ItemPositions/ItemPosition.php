<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPosition extends Resource
{
    public ItemPositionType $type;

//    public function __construct(
//        ItemPositionType $type
//    )
//    {
//        dump('ItemPosition::construct:', $type);
//
//        return match ($type) {
//            ItemPositionType::CUSTOM => new ItemPositionCustom(),
//        };
//    }
}