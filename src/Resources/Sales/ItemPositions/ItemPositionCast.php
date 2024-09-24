<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\Castable;
use Spatie\LaravelData\Casts\IterableItemCast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class ItemPositionCast implements Cast, IterableItemCast, Castable
{

    public static function dataCastUsing(array $arguments): Cast
    {
//        dump('ItemPositionCast::dataCastUsing:', $arguments);
        return new self();
    }

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
//        dump('ItemPositionCast::cast');
        return new ItemPositionCollection(array_map(fn ($item) => $this->matchItemPositionType($item), $value));
    }

    public function castIterableItem(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
//        dump('ItemPositionCast::castIterableItem:', $value);
        return $this->matchItemPositionType($value);
    }


    private function matchItemPositionType(mixed $item)
    {
//        return $item;
        $type = ItemPositionType::from($item['type']);
        return match ($type) {
            ItemPositionType::ARTICLE => ItemPositionArticle::from($item),
            ItemPositionType::CUSTOM => ItemPositionCustom::from($item),
            ItemPositionType::SUBPOSITION => ItemPositionSubposition::from($item),
            ItemPositionType::TEXT => ItemPositionText::from($item),
        };
    }

//    public static function dataCastUsing(...$arguments): Cast
//    {
//        return new class implements Cast {
//
//        };
//    }


}