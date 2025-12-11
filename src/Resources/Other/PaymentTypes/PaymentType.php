<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\PaymentTypes;

use Bexio\Resources\Other\PaymentTypes\Requests\GetPaymentTypesRequest;
use Bexio\Resources\Resource;

class PaymentType extends Resource
{
    public const INDEX_REQUEST = GetPaymentTypesRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}

