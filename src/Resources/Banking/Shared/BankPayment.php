<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Shared;

use Bexio\Resources\Resource;

class BankPayment extends Resource
{
    public function __construct(
        public ?BankPaymentAmount $instructed_amount = null,
        public ?BankPaymentRecipient $recipient = null,
        public ?string $iban = null,
        public ?string $execution_date = null,
        public ?bool $is_salary_payment = null,
        public ?bool $is_editing_restricted = null,
        public ?string $message = null,
        public ?string $allowance_type = null,
        public ?string $qr_reference_nr = null,
        public ?string $additional_information = null,
    ) {
    }
}



