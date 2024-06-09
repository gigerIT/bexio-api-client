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
}
