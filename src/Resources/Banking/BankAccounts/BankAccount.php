<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\BankAccounts;

use Bexio\Resources\Banking\BankAccounts\Requests\GetBankAccountRequest;
use Bexio\Resources\Banking\BankAccounts\Requests\GetBankAccountsRequest;
use Bexio\Resources\Resource;

class BankAccount extends Resource
{
    public const INDEX_REQUEST = GetBankAccountsRequest::class;
    public const SHOW_REQUEST = GetBankAccountRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $owner = null,
        public ?string $owner_address = null,
        public string|int|null $owner_house_number = null,
        public ?int $owner_zip = null,
        public ?string $owner_city = null,
        public ?string $owner_country_code = null,
        public ?int $bc_nr = null,
        public ?string $bank_name = null,
        public ?string $bank_nr = null,
        public ?string $bank_account_nr = null,
        public ?string $iban_nr = null,
        public ?int $currency_id = null,
        public ?int $account_id = null,
        public ?string $remarks = null,
        public ?string $invoice_mode = null,
        public ?string $qr_invoice_iban = null,
        public ?string $type = null,
    ) {
    }
}



