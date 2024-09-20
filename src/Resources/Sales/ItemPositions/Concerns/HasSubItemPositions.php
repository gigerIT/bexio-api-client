<?php

namespace Bexio\Resources\Sales\ItemPositions\Concerns;

use Bexio\Resources\Sales\ItemPositions\ItemPositionSubposition;

trait HasSubItemPositions
{
    public function addItemSubPosition(ItemPositionSubposition $itemPositionSubposition): ItemPositionSubposition
    {
        if (!isset($this->id)) {
            throw new \Exception('The resource must be saved before adding a sub item position.');
        }

        $itemPositionSubposition->attachClient($this->client());

        return $itemPositionSubposition->createFor($this);
    }

}