<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

class ItemPositionArticle extends ItemPosition
{
    public ItemPositionType $type = ItemPositionType::ARTICLE;

    public function __construct(
        public ?string $amount,
        public ?int    $unit_id,
        public ?int    $account_id,
        public ?int    $tax_id,
        public ?string $text,
        public ?string $unit_price,
        public ?int    $article_id,
        public ?string $discount_in_percent,
    )

    {

    }
}