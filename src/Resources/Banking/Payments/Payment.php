<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\Payments;

use Bexio\Resources\Banking\Payments\Requests\CancelPaymentRequest;
use Bexio\Resources\Banking\Payments\Requests\CreatePaymentRequest;
use Bexio\Resources\Banking\Payments\Requests\DeletePaymentRequest;
use Bexio\Resources\Banking\Payments\Requests\GetPaymentRequest;
use Bexio\Resources\Banking\Payments\Requests\GetPaymentsRequest;
use Bexio\Resources\Banking\Payments\Requests\UpdatePaymentRequest;
use Bexio\Resources\Resource;

/**
 * @method PaymentQueryBuilder query()
 */
class Payment extends Resource
{
    public const INDEX_REQUEST = GetPaymentsRequest::class;
    public const SHOW_REQUEST = GetPaymentRequest::class;
    public const CREATE_REQUEST = CreatePaymentRequest::class;
    public const UPDATE_REQUEST = UpdatePaymentRequest::class;
    public const DELETE_REQUEST = DeletePaymentRequest::class;
    public const QUERY_BUILDER = PaymentQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?PaymentAccount $sender = null,
        public ?PaymentRecipient $recipient = null,
        public string|float|null $amount = null,
        public ?string $currency = null,
        public ?string $execution_date = null,
        public ?string $allowance = null,
        public ?bool $is_salary = null,
        public ?string $instruction_id = null,
        public ?PurchasePaymentReference $purchase_reference = null,
        public ?string $document_no = null,
        public ?string $qr_reference_number = null,
        public ?string $additional_information = null,
        public ?string $status = null,
        public ?string $type = null,
        public ?string $due_date = null,
        public ?string $created_at = null,
        public ?bool $is_editing_restricted = null,
        public ?string $message = null,
        public ?string $account_id = null,
    ) {
    }

    public function cancel(?string $paymentId = null): Payment
    {
        $targetId = $paymentId ?? $this->uuid ?? ($this->id !== null ? (string)$this->id : null);
        if ($targetId === null) {
            throw new \RuntimeException('uuid or id is required to cancel a payment.');
        }

        $request = new CancelPaymentRequest($targetId);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function toApi(): Payment
    {
        return $this->except(
            'id',
            'uuid',
            'sender',
            'instruction_id',
            'purchase_reference',
            'document_no',
            'status',
            'created_at',
            'due_date',
        );
    }

    public function toUpdateApi(): Payment
    {
        return $this->only(
            'allowance',
            'amount',
            'currency',
            'execution_date',
            'is_salary',
            'recipient',
            'is_editing_restricted',
            'message',
        );
    }
}

