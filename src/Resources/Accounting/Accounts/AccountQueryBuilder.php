<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Accounts;

use Bexio\Resources\Accounting\Accounts\Requests\SearchAccountsRequest;
use Bexio\Support\SearchableQueryBuilder;

class AccountQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchAccountsRequest::class;
}
