<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Countries;

use Bexio\Resources\Other\Countries\Requests\SearchCountryRequest;
use Bexio\Support\SearchableQueryBuilder;

class CountryQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchCountryRequest::class;
}
