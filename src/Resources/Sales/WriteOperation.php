<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

enum WriteOperation
{
    case CREATE;
    case UPDATE;
    // An item position written inside its sales document's create body.
    case INLINE;
}
