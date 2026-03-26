<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations;

use Bexio\Resources\Contacts\ContactRelations\Requests\CreateContactRelationRequest;
use Bexio\Resources\Contacts\ContactRelations\Requests\DeleteContactRelationRequest;
use Bexio\Resources\Contacts\ContactRelations\Requests\GetContactRelationRequest;
use Bexio\Resources\Contacts\ContactRelations\Requests\GetContactRelationsRequest;
use Bexio\Resources\Contacts\ContactRelations\Requests\UpdateContactRelationRequest;
use Bexio\Resources\Resource;

/**
 * @method ContactRelationQueryBuilder query()
 */
class ContactRelation extends Resource
{
    const INDEX_REQUEST = GetContactRelationsRequest::class;

    const SHOW_REQUEST = GetContactRelationRequest::class;

    const CREATE_REQUEST = CreateContactRelationRequest::class;

    const UPDATE_REQUEST = UpdateContactRelationRequest::class;

    const DELETE_REQUEST = DeleteContactRelationRequest::class;

    const QUERY_BUILDER = ContactRelationQueryBuilder::class;

    public function __construct(
        public int $contact_id,
        public int $contact_sub_id,
        public ?int $id = null,
        public ?string $description = null,
        public ?string $updated_at = null,
    ) {}
}
