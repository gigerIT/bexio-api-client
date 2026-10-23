<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Bexio\Resources\Sales\Writable;
use Bexio\Resources\Sales\WriteOperation;

class ItemPositionArticle extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::ARTICLE;

    public ?string $position_total;
    public ?string $tax_value;
    public ?string $unit_name;
    public ?string $amount_completed;
    public ?string $amount_open;
    public ?string $amount_reserved;

    public function __construct(
        public ?string $amount,
        public ?int    $unit_id,
        public ?int    $account_id,
        public ?int    $tax_id,
        public ?string $text,
        public ?string $unit_price,
        // Article position updates reject article_id.
        #[Writable(on: [WriteOperation::CREATE, WriteOperation::INLINE])]
        public ?int    $article_id,
        public ?string $discount_in_percent,
    )

    {

    }
}
