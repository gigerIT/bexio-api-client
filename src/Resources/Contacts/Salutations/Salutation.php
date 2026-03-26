<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Salutations;

use Bexio\Resources\Contacts\Salutations\Requests\CreateSalutationRequest;
use Bexio\Resources\Contacts\Salutations\Requests\DeleteSalutationRequest;
use Bexio\Resources\Contacts\Salutations\Requests\GetSalutationRequest;
use Bexio\Resources\Contacts\Salutations\Requests\GetSalutationsRequest;
use Bexio\Resources\Contacts\Salutations\Requests\UpdateSalutationRequest;
use Bexio\Resources\Resource;

/**
 * @method SalutationQueryBuilder query()
 */
class Salutation extends Resource
{
    const INDEX_REQUEST = GetSalutationsRequest::class;

    const SHOW_REQUEST = GetSalutationRequest::class;

    const CREATE_REQUEST = CreateSalutationRequest::class;

    const UPDATE_REQUEST = UpdateSalutationRequest::class;

    const DELETE_REQUEST = DeleteSalutationRequest::class;

    const QUERY_BUILDER = SalutationQueryBuilder::class;

    public function __construct(
        public string $name,
        public ?int $id = null,
    ) {}
}
