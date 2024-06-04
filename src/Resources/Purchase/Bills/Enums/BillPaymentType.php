<?php

namespace Bexio\Resources\Purchase\Bills\Enums;

enum BillPaymentType: string
{
    case IBAN = 'IBAN';
    case QR = 'QR';
    case MANUAL = 'MANUAL';
}
