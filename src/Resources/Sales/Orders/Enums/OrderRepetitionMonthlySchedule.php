<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Enums;

enum OrderRepetitionMonthlySchedule: string
{
    case FIXED_DAY = 'fixed_day';
    case WEEK_DAY = 'week_day';
    case FIRST_DAY = 'first_day';
    case LAST_DAY = 'last_day';
}
