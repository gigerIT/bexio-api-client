<?php

namespace Bexio\Resources\Sales;

enum MwstType: int
{
    case INCLUDING = 0;
    case EXCLUDING = 1;
    case EXEMPT = 2;
}
