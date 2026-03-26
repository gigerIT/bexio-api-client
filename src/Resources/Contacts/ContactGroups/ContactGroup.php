<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactGroups;

use Bexio\Resources\Contacts\ContactGroups\Requests\CreateContactGroupRequest;
use Bexio\Resources\Contacts\ContactGroups\Requests\DeleteContactGroupRequest;
use Bexio\Resources\Contacts\ContactGroups\Requests\GetContactGroupRequest;
use Bexio\Resources\Contacts\ContactGroups\Requests\GetContactGroupsRequest;
use Bexio\Resources\Contacts\ContactGroups\Requests\UpdateContactGroupRequest;
use Bexio\Resources\Resource;

/**
 * @method ContactGroupQueryBuilder query()
 */
class ContactGroup extends Resource
{
    const INDEX_REQUEST = GetContactGroupsRequest::class;

    const SHOW_REQUEST = GetContactGroupRequest::class;

    const CREATE_REQUEST = CreateContactGroupRequest::class;

    const UPDATE_REQUEST = UpdateContactGroupRequest::class;

    const DELETE_REQUEST = DeleteContactGroupRequest::class;

    const QUERY_BUILDER = ContactGroupQueryBuilder::class;

    public function __construct(
        public string $name,
        public ?int $id = null,
    ) {}
}
