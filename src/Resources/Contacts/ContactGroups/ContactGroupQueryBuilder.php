<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactGroups;

use Bexio\Resources\Contacts\ContactGroups\Requests\SearchContactGroupRequest;
use Bexio\Support\SearchableQueryBuilder;

class ContactGroupQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchContactGroupRequest::class;
}
