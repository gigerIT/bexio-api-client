<?php

namespace Bexio\Resources\Sales;

enum MwstType: int
{
    /** Taxes are calculated: `mwst_is_net: false` means prices include tax, `true` adds tax on top. */
    case INCLUDING = 0;

    /**
     * No tax is calculated: the total equals the net sum.
     * To add tax to net prices, use INCLUDING with `mwst_is_net: true`.
     */
    case EXCLUDING = 1;

    /** Tax exempt: no tax is calculated. */
    case EXEMPT = 2;
}
