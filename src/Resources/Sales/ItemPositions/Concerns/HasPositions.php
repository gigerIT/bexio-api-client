<?php

namespace Bexio\Resources\Sales\ItemPositions\Concerns;

use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;

trait HasPositions
{
    public function addPosition(ItemPosition $position): static
    {
        if ($this->positions === null) {
            $this->positions = new ItemPositionCollection([]);
        }

        $this->positions->add($position);

        return $this;
    }
}
