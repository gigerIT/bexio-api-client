<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Bexio\Resources\Sales\ItemPositions\Enums\ItemPositionType;
use Spatie\LaravelData\Data;

class DocumentConversionPosition extends Data
{
    public function __construct(
        public int $id,
        public ItemPositionType $type,
        public int|float|string $amount,
    ) {
    }

    /**
     * @return array{id: int, type: string, amount: int|float|string}
     */
    public function toPayload(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
            'amount' => $this->amount,
        ];
    }
}
