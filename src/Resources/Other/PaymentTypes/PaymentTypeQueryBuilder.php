<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\PaymentTypes;

use Bexio\Resources\Other\PaymentTypes\Requests\SearchPaymentTypeRequest;
use Bexio\Support\SearchableQueryBuilder;

class PaymentTypeQueryBuilder extends SearchableQueryBuilder
{
    protected const SEARCH_REQUEST = SearchPaymentTypeRequest::class;
}
