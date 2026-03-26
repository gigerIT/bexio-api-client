<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\Contacts;

use Bexio\Resources\Contacts\Contacts\Requests\SearchContactRequest;
use Bexio\Support\SearchableQueryBuilder;

class ContactQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchContactRequest::class;

    /**
     * Include archived contacts in the results.
     */
    public function withArchived(): static
    {
        $this->setParameter('showArchived', true);

        return $this;
    }
}
