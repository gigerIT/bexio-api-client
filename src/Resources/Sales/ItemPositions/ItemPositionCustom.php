<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionCustom extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::CUSTOM;

    public ?string $position_total;
    public ?string $tax_value;
    public ?string $unit_name;
    public ?string $amount_completed;
    public ?string $amount_open;
    public ?string $amount_reserved;



    public function __construct(
        public ?int    $tax_id = null,

        public ?string $amount = null,
        public ?int    $unit_id = null,
        public ?int    $account_id = null,
        public ?string $text = null,
        public ?string $unit_price = null,
        public ?string $discount_in_percent = null,
    )

    {

    }
}
