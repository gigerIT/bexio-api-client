<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\Titles;

use Bexio\Resources\Contacts\Titles\Requests\SearchTitleRequest;
use Bexio\Support\SearchableQueryBuilder;

class TitleQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchTitleRequest::class;
}
