<?php

namespace Bexio\Resources\Sales\Invoices\Enums;

enum InvoiceStatus: int
{
    case DRAFT = 7;
    case PENDING = 8;
    case PAID = 9;
    case PARTIAL = 16;
    case CANCELED = 19;
    case UNPAID = 31;


    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PENDING => 'Pending',
            self::PAID => 'Paid',
            self::PARTIAL => 'Partial',
            self::CANCELED => 'Canceled',
            self::UNPAID => 'Unpaid',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'grey',
            self::PENDING => 'blue',
            self::PAID => 'green',
            self::PARTIAL => 'yellow',
            self::CANCELED => 'red',
            self::UNPAID => 'red',
        };
    }
}
