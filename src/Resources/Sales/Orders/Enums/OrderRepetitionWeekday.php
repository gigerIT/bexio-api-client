<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders\Enums;

enum OrderRepetitionWeekday: string
{
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESDAY = 'wednesday';
    case THURSDAY = 'thursday';
    case FRIDAY = 'friday';
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';
}
