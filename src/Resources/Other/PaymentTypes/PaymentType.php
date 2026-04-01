<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\PaymentTypes;

use Bexio\Resources\Other\PaymentTypes\Requests\GetPaymentTypesRequest;
use Bexio\Resources\Resource;

/**
 * @method PaymentTypeQueryBuilder query()
 */
class PaymentType extends Resource
{
    public const INDEX_REQUEST = GetPaymentTypesRequest::class;
    public const QUERY_BUILDER = PaymentTypeQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}

