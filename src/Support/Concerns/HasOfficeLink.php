<?php

namespace Bexio\Support\Concerns;

use Bexio\Resources\Resource;

/** @mixin Resource */
trait HasOfficeLink
{
    public function officeLink(?int $id = null): string
    {
        return self::OFFICE_BASE_URI . str_replace('{id}', (string)$id ?? $this->id, self::SHOW_URI);
    }
}