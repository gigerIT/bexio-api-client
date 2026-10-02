<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\ItemPositions;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;

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
        public ?int    $article_id,
        public ?string $discount_in_percent,
    )

    {

    }

    public function toApiPayload(): array
    {
        $payload = parent::toApiPayload();

        unset($payload['article_id'], $payload['parent_id']);

        return $payload;
    }

    public function toCreateApiPayload(): array
    {
        // Dedicated creation accepts article_id and parent_id; updates do not.
        return parent::toApiPayload();
    }
}
