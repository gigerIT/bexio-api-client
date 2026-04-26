<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Concerns;

use LogicException;

trait ResolvesKbDocumentId
{
    public function resolveKbDocumentId(): int
    {
        $id = $this->resolveResourceId();

        if (! is_int($id)) {
            throw new LogicException(static::class . ' does not have a numeric KB document id.');
        }

        return $id;
    }
}
