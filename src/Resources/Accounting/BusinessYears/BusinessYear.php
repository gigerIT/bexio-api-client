<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\BusinessYears;

use Bexio\Resources\Accounting\BusinessYears\Requests\GetBusinessYearRequest;
use Bexio\Resources\Accounting\BusinessYears\Requests\GetBusinessYearsRequest;
use Bexio\Resources\Resource;

class BusinessYear extends Resource
{
    public const INDEX_REQUEST = GetBusinessYearsRequest::class;
    public const SHOW_REQUEST = GetBusinessYearRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $date_start = null,
        public ?string $date_end = null,
        public ?bool $is_closed = null,
    ) {
    }
}

