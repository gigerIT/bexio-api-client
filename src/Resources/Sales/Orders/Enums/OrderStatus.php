<?php

namespace Bexio\Resources\Sales\Orders\Enums;

enum OrderStatus: int
{
    case PENDING = 5;
    case DONE = 6;
    case PARTIAL = 15;
    case CANCELED = 21;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::DONE => 'Done',
            self::PARTIAL => 'Partial',
            self::CANCELED => 'Canceled',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'blue',
            self::DONE => 'green',
            self::PARTIAL => 'yellow',
            self::CANCELED => 'red',
        };
    }
}
