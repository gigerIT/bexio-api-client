<?php

namespace Bexio\Resources\Purchase\Bills;

enum BillPaymentFee: string
{
    /**
     * "BY_SENDER" "BY_RECEIVER" "BREAKDOWN" "NO_FEE"
     */
    case BY_SENDER = 'BY_SENDER';
    case BY_RECEIVER = 'BY_RECEIVER';
    case BREAKDOWN = 'BREAKDOWN';
    case NO_FEE = 'NO_FEE';

}
