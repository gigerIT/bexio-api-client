<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations;

use Bexio\Support\Data;

class ContactRelation extends Data
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