<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Languages;

use Bexio\Resources\Other\Languages\Requests\SearchLanguageRequest;
use Bexio\Support\SearchableQueryBuilder;

class LanguageQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchLanguageRequest::class;
}
