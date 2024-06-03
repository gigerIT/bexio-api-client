<?php

namespace Bexio\Resources\Purchase\PurchaseOrders\Enums;

enum PurchaseOrderStatus: int
{
    case DRAFT = 22;
    case OPEN = 23;
    case PARTLY = 24;
    case DONE = 25;
    case CANCELED = 26;
}
