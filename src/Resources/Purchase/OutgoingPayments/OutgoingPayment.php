<?php

declare(strict_types=1);

namespace Bexio\Resources\Purchase\OutgoingPayments;

use Bexio\Resources\Purchase\OutgoingPayments\Requests\CreateOutgoingPaymentRequest;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\DeleteOutgoingPaymentRequest;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\GetOutgoingPaymentRequest;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\GetOutgoingPaymentsRequest;
use Bexio\Resources\Purchase\OutgoingPayments\Requests\UpdateOutgoingPaymentRequest;
use Bexio\Resources\Resource;

class OutgoingPayment extends Resource
{
    public const INDEX_REQUEST = GetOutgoingPaymentsRequest::class;

    public const SHOW_REQUEST = GetOutgoingPaymentRequest::class;

    public const CREATE_REQUEST = CreateOutgoingPaymentRequest::class;

    public const UPDATE_REQUEST = UpdateOutgoingPaymentRequest::class;

    public const DELETE_REQUEST = DeleteOutgoingPaymentRequest::class;

    public function __construct(
        public ?string $id = null,
        public ?string $bill_id = null,
        public ?string $payment_type = null,
        public ?string $execution_date = null,
        public ?string $status = null,
        public ?float $amount = null,
        public ?int $sender_bank_account_id = null,
        public ?string $receiver_account_no = null,
        public ?string $receiver_iban = null,
        public ?string $banking_payment_id = null,
        public ?string $transaction_id = null,
        public ?string $currency_code = null,
        public ?float $exchange_rate = null,
        public ?string $note = null,
        public ?string $sender_iban = null,
        public ?string $sender_name = null,
        public ?string $sender_street = null,
        public ?string $sender_house_no = null,
        public ?string $sender_city = null,
        public ?string $sender_postcode = null,
    ) {}
}
