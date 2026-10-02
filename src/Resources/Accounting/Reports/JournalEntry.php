<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Reports;

use Bexio\Resources\Accounting\Reports\Requests\GetJournalRequest;
use Bexio\Resources\Resource;

class JournalEntry extends Resource
{
    public const INDEX_REQUEST = GetJournalRequest::class;

    public ?int $debit_account_id = null;
    public ?int $credit_account_id = null;
    public ?int $currency_id = null;
    public ?int $base_currency_id = null;
    public ?float $currency_factor = null;
    public ?float $base_currency_amount = null;
    public ?string $ref_class = null;
    public ?int $ref_id = null;
    public ?string $ref_uuid = null;

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
