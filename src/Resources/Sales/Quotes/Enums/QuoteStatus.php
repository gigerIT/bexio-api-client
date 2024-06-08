<?php

namespace Bexio\Resources\Sales\Quotes\Enums;

enum QuoteStatus: int
{
    case DRAFT = 1;
    case PENDING = 2;
    case CONFIRMED = 3;
    case DEClLINED = 4;
}
