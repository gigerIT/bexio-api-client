<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactSectors;

use Bexio\Resources\Contacts\ContactSectors\Requests\SearchContactSectorRequest;
use Bexio\Support\SearchableQueryBuilder;

class ContactSectorQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchContactSectorRequest::class;
}
