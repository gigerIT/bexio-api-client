<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations;

use Bexio\Resources\Resource;

class ContactRelation extends Resource
{
    public function __construct(
        public readonly int     $id,
        public readonly int     $contact_id,
        public readonly int     $contact_sub_id,
        public readonly ?string $description,
        public readonly ?string $updated_at,
    )
    {
    }
}