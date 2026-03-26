<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations;

use Bexio\Resources\Contacts\ContactRelations\Requests\SearchContactRelationRequest;
use Bexio\Support\SearchableQueryBuilder;

class ContactRelationQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchContactRelationRequest::class;
}
