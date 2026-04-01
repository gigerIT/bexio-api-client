<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes;

use Bexio\Resources\Other\Notes\Requests\SearchNotesRequest;
use Bexio\Support\SearchableQueryBuilder;

class NoteQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchNotesRequest::class;
}
