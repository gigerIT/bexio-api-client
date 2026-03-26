<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactSectors;

use Bexio\Resources\Contacts\ContactSectors\Requests\GetContactSectorRequest;
use Bexio\Resources\Contacts\ContactSectors\Requests\GetContactSectorsRequest;
use Bexio\Resources\Resource;

/**
 * @method ContactSectorQueryBuilder query()
 */
class ContactSector extends Resource
{
    const INDEX_REQUEST = GetContactSectorsRequest::class;

    const SHOW_REQUEST = GetContactSectorRequest::class;

    const QUERY_BUILDER = ContactSectorQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {}
}
