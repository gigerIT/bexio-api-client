<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Enums;

enum OrderRepetitionType: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
}
