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
        return self::OFFICE_BASE_URL . str_replace('{id}', (string)$this->id, self::SHOW_URL);
    }

    /**
     * get the bexio deeplink of the resource by id
     */
    public static function officeLinkFor(int $id): string
    {
        return self::OFFICE_BASE_URL . str_replace('{id}', (string)$id, self::SHOW_URL);
    }
}