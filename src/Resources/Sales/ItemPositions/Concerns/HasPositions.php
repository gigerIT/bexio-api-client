<?php

namespace Bexio\Resources\Sales\ItemPositions\Concerns;

use Bexio\Resources\Sales\ItemPositions\ItemPosition;

trait HasPositions
{
    public function addPosition(ItemPosition $position): void
    {
        $this->positions[] = $position;
    }
}