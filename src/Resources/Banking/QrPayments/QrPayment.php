<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\QrPayments;

use Bexio\Resources\Banking\QrPayments\Requests\CreateQrPaymentRequest;
use Bexio\Resources\Banking\QrPayments\Requests\GetQrPaymentRequest;
use Bexio\Resources\Banking\QrPayments\Requests\UpdateQrPaymentRequest;
use Bexio\Resources\Banking\Shared\BankPayment;
use Bexio\Resources\Banking\Shared\BankPaymentAccount;
use Bexio\Resources\Resource;
use RuntimeException;

class QrPayment extends Resource
{
    public const CREATE_REQUEST = CreateQrPaymentRequest::class;
    public const SHOW_REQUEST = GetQrPaymentRequest::class;
    public const UPDATE_REQUEST = UpdateQrPaymentRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $type = 'qr',
        public ?BankPaymentAccount $bank_account = null,
        public ?BankPayment $payment = null,
        public ?string $instruction_id = null,
        public ?string $status = null,
        public ?string $created_at = null,
        public int|string|null $bank_account_id = null,
    ) {
    }

    public function withBankAccountId(int|string $bankAccountId): static
    {
        $this->bank_account_id = $bankAccountId;
        return $this;
    }

    public function forBankAccount(int|string $bankAccountId): static
    {
        return $this->withBankAccountId($bankAccountId);
    }

    public function find(int|string $id): static
    {
        $bankAccountId = $this->bank_account_id;
        if ($bankAccountId === null) {
            throw new RuntimeException('bank_account_id is required to fetch a QR payment.');
        }

        $request = new GetQrPaymentRequest($bankAccountId, $id);
        $response = $this->client()->send($request);

        return $request
            ->createDtoFromResponse($response)
            ->withBankAccountId($bankAccountId)
            ->attachClient($this->client());
    }

    public function refresh(): static
    {
        if ($this->id === null) {
            throw new RuntimeException('Cannot refresh a QR payment without an id.');
        }

        return $this->find($this->id);
    }
}



