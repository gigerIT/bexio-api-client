<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\Salutations;

use Bexio\Resources\Contacts\Salutations\Requests\SearchSalutationRequest;
use Bexio\Support\SearchableQueryBuilder;

class SalutationQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchSalutationRequest::class;
}
