<?php

use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\ItemPositions\ItemPositionArticle;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCast;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCustom;
use Bexio\Resources\Sales\ItemPositions\ItemPositionDiscount;
use Bexio\Resources\Sales\ItemPositions\ItemPositionPagebreak;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionSubtotal;
use Bexio\Resources\Sales\ItemPositions\ItemPositionText;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

it('hydrates every supported item position type', function () {
    class ItemPositionCastTestData extends Data
    {
        public function __construct(
            #[WithCast(ItemPositionCast::class)]
            public ItemPositionCollection $positions,
        ) {
        }
    }

    $payloadsByType = [
        ItemPositionType::CUSTOM->value => [
            'id' => 1,
            'type' => ItemPositionType::CUSTOM->value,
            'tax_id' => 28,
            'amount' => '1.000000',
            'unit_id' => 1,
            'account_id' => 3200,
            'text' => 'Custom position',
            'unit_price' => '50.000000',
            'discount_in_percent' => null,
        ],
        ItemPositionType::ARTICLE->value => [
            'id' => 2,
            'type' => ItemPositionType::ARTICLE->value,
            'amount' => '2.000000',
            'unit_id' => 1,
            'account_id' => 3200,
            'tax_id' => 28,
            'text' => 'Article position',
            'unit_price' => '100.000000',
            'article_id' => 99,
            'discount_in_percent' => '10.000000',
        ],
        ItemPositionType::TEXT->value => [
            'id' => 3,
            'type' => ItemPositionType::TEXT->value,
            'text' => 'Text position',
            'show_pos_nr' => true,
        ],
        ItemPositionType::SUBTOTAL->value => [
            'id' => 4,
            'type' => ItemPositionType::SUBTOTAL->value,
            'text' => 'Subtotal',
            'value' => '17.800000',
        ],
        ItemPositionType::PAGEBREAK->value => [
            'id' => 5,
            'type' => ItemPositionType::PAGEBREAK->value,
            'internal_pos' => 5,
            'is_optional' => false,
            'parent_id' => null,
        ],
        ItemPositionType::DISCOUNT->value => [
            'id' => 6,
            'type' => ItemPositionType::DISCOUNT->value,
            'text' => 'Partner discount',
            'is_percentual' => true,
            'value' => '10.000000',
            'discount_total' => '1.780000',
        ],
        ItemPositionType::SUBPOSITION->value => [
            'id' => 7,
            'type' => ItemPositionType::SUBPOSITION->value,
            'text' => 'Container position',
            'show_pos_nr' => false,
        ],
    ];

    expect(array_keys($payloadsByType))->toEqual(array_map(
        fn (ItemPositionType $type) => $type->value,
        ItemPositionType::cases(),
    ));

    $data = ItemPositionCastTestData::from([
        'positions' => array_values($payloadsByType),
    ]);

    expect($data->positions->all())->toHaveCount(count(ItemPositionType::cases()))
        ->and($data->positions[0])->toBeInstanceOf(ItemPositionCustom::class)
        ->and($data->positions[1])->toBeInstanceOf(ItemPositionArticle::class)
        ->and($data->positions[2])->toBeInstanceOf(ItemPositionText::class)
        ->and($data->positions[3])->toBeInstanceOf(ItemPositionSubtotal::class)
        ->and($data->positions[4])->toBeInstanceOf(ItemPositionPagebreak::class)
        ->and($data->positions[5])->toBeInstanceOf(ItemPositionDiscount::class)
        ->and($data->positions[6])->toBeInstanceOf(ItemPositionSubposition::class)
        ->and($data->positions[3]->value)->toBe('17.800000')
        ->and($data->positions[5]->discount_total)->toBe('1.780000')
        ->and($data->positions[4]->type)->toBe(ItemPositionType::PAGEBREAK);
});
