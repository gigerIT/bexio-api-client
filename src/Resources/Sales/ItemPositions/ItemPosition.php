<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPosition extends Resource
{
    public ItemPositionType $type;

    public ?int $id;

    public ?int $internal_pos;

    public ?int $parent_id;

    public ?bool $is_optional;






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