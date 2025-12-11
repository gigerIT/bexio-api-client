<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Reports;

use Bexio\Resources\Accounting\Reports\Requests\GetJournalRequest;
use Bexio\Resources\Resource;

class JournalEntry extends Resource
{
    public const INDEX_REQUEST = GetJournalRequest::class;

    public function __construct(
        public ?string $id = null,
        public ?string $date = null,
        public ?string $account_uuid = null,
        public ?string $description = null,
        public ?float $amount = null,
        public ?string $currency_code = null,
    ) {
    }
}

