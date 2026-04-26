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
        public ?string $sender_country_code = null,
        public ?string $sender_bc_no = null,
        public ?string $sender_bank_no = null,
        public ?string $sender_bank_name = null,
        public ?string $receiver_name = null,
        public ?string $receiver_street = null,
        public ?string $receiver_house_no = null,
        public ?string $receiver_city = null,
        public ?string $receiver_postcode = null,
        public ?string $receiver_country_code = null,
        public ?string $receiver_bc_no = null,
        public ?string $receiver_bank_no = null,
        public ?string $receiver_bank_name = null,
        public ?string $fee_type = null,
        public ?bool $is_salary_payment = null,
        public ?string $reference_no = null,
        public ?string $message = null,
        public ?string $booking_text = null,
    ) {
    }

    public function toCreateApi(): array
    {
        return $this->withoutNulls($this->except(
            'id',
            'status',
            'banking_payment_id',
            'transaction_id',
        )->toArray());
    }

    public function toUpdateApi(): array
    {
        return $this->withoutNulls([
            'payment_id' => $this->id,
            'execution_date' => $this->execution_date,
            'amount' => $this->amount,
            'fee_type' => $this->fee_type,
            'is_salary_payment' => $this->is_salary_payment,
            'reference_no' => $this->reference_no,
            'message' => $this->message,
            'receiver_iban' => $this->receiver_iban,
            'receiver_name' => $this->receiver_name,
            'receiver_street' => $this->receiver_street,
            'receiver_house_no' => $this->receiver_house_no,
            'receiver_city' => $this->receiver_city,
            'receiver_postcode' => $this->receiver_postcode,
            'receiver_country_code' => $this->receiver_country_code,
        ]);
    }

    private function withoutNulls(array $payload): array
    {
        return array_filter($payload, static fn (mixed $value): bool => $value !== null);
    }
}
