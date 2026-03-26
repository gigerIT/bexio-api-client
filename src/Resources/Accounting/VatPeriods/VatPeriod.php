<?php

declare(strict_types=1);

namespace Bexio\Resources\Accounting\VatPeriods;

use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodRequest;
use Bexio\Resources\Accounting\VatPeriods\Requests\GetVatPeriodsRequest;
use Bexio\Resources\Resource;

class VatPeriod extends Resource
{
    public const INDEX_REQUEST = GetVatPeriodsRequest::class;

    public const SHOW_REQUEST = GetVatPeriodRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $date_from = null,
        public ?string $date_to = null,
        public ?string $status = null,
    ) {}
}
