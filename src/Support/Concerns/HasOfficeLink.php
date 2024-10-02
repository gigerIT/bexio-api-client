<?php

namespace Bexio\Support\Concerns;

use Bexio\Resources\Resource;

/** @mixin Resource */
trait HasOfficeLink
{
    /**
     * get the bexio deeplink of the current resource
     */
    public function officeLink(): string
    {
        return self::OFFICE_BASE_URI . str_replace('{id}', (string)$this->id, self::SHOW_URI);
    }

    /**
     * get the bexio deeplink of the resource by id
     */
    public static function officeLinkFor(int $id): string
    {
        return self::OFFICE_BASE_URI . str_replace('{id}', (string)$id, self::SHOW_URI);
    }
}