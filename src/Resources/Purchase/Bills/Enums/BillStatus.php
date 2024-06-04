<?php

namespace Bexio\Resources\Purchase\Bills\Enums;

enum BillStatus: string
{
    case DRAFT = 'DRAFT';
    case BOOKED = 'BOOKED';
    case PARTIALLY_CREATED = 'PARTIALLY_CREATED';
    case CREATED = 'CREATED';
    case PARTIALLY_SENT = 'PARTIALLY_SENT';
    case SENT = 'SENT';
    case PARTIALLY_DOWNLOADED = 'PARTIALLY_DOWNLOADED';
    case DOWNLOADED = 'DOWNLOADED';
    case PARTIALLY_PAID = 'PARTIALLY_PAID';
    case PAID = 'PAID';
    case PARTIALLY_FAILED = 'PARTIALLY_FAILED';
    case FAILED = 'FAILED';


}
