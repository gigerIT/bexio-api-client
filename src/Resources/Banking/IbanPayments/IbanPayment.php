<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\IbanPayments;

use Bexio\Resources\Banking\IbanPayments\Requests\CreateIbanPaymentRequest;
use Bexio\Resources\Banking\IbanPayments\Requests\GetIbanPaymentRequest;
use Bexio\Resources\Banking\IbanPayments\Requests\UpdateIbanPaymentRequest;
use Bexio\Resources\Banking\Shared\BankPayment;
use Bexio\Resources\Banking\Shared\BankPaymentAccount;
use Bexio\Resources\Resource;
use RuntimeException;

class IbanPayment extends Resource
{
    public const CREATE_REQUEST = CreateIbanPaymentRequest::class;
    public const SHOW_REQUEST = GetIbanPaymentRequest::class;
    public const UPDATE_REQUEST = UpdateIbanPaymentRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $type = 'iban',
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
            throw new RuntimeException('bank_account_id is required to fetch an IBAN payment.');
        }

        $request = new GetIbanPaymentRequest($bankAccountId, $id);
        $response = $this->client()->send($request);

        return $request
            ->createDtoFromResponse($response)
            ->withBankAccountId($bankAccountId)
            ->attachClient($this->client());
    }

    public function refresh(): static
    {
        if ($this->id === null) {
            throw new RuntimeException('Cannot refresh an IBAN payment without an id.');
        }

        return $this->find($this->id);
    }
}


