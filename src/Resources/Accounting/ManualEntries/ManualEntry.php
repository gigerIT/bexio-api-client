<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries;

use Bexio\Resources\Accounting\ManualEntries\Requests\CreateManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\DeleteManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\GetManualEntriesRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\GetManualEntryRequest;
use Bexio\Resources\Accounting\ManualEntries\Requests\UpdateManualEntryRequest;
use Bexio\Resources\Resource;

class ManualEntry extends Resource
{
    public const INDEX_REQUEST = GetManualEntriesRequest::class;
    public const SHOW_REQUEST = GetManualEntryRequest::class;
    public const CREATE_REQUEST = CreateManualEntryRequest::class;
    public const UPDATE_REQUEST = UpdateManualEntryRequest::class;
    public const DELETE_REQUEST = DeleteManualEntryRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $type = null,
        public ?string $date = null,
        public ?string $reference_nr = null,
        public ?string $description = null,
        public ?float $amount = null,
        public ?string $currency_code = null,
        public array $entries = [],
    ) {
    }

    public function toApi(): ManualEntry
    {
        return $this->except('uuid');
    }
}

