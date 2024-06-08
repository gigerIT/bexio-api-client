<?php

namespace Bexio\Resources\Sales;

enum MwstType: int
{
    case INCLUDING = 1;
    case EXCLUDING = 2;
    case EXEMPT = 3;
}
