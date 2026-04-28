<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\BusinessYears;

use Bexio\Resources\Accounting\BusinessYears\Requests\GetBusinessYearRequest;
use Bexio\Resources\Accounting\BusinessYears\Requests\GetBusinessYearsRequest;
use Bexio\Resources\Resource;
use Spatie\LaravelData\Attributes\MapInputName;

class BusinessYear extends Resource
{
    public const INDEX_REQUEST = GetBusinessYearsRequest::class;
    public const SHOW_REQUEST = GetBusinessYearRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        #[MapInputName('start')]
        public ?string $date_start = null,
        #[MapInputName('end')]
        public ?string $date_end = null,
        public ?bool $is_closed = null,
        public ?string $status = null,
        public ?string $closed_at = null,
    ) {
    }
}

