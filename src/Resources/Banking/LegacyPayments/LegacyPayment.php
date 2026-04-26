<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\LegacyPayments;

use Bexio\Resources\Banking\LegacyPayments\Requests\CancelLegacyPaymentRequest;
use Bexio\Resources\Banking\LegacyPayments\Requests\DeleteLegacyPaymentRequest;
use Bexio\Resources\Banking\LegacyPayments\Requests\GetLegacyPaymentsRequest;
use Bexio\Resources\Resource;

class LegacyPayment extends Resource
{
    public const INDEX_REQUEST = GetLegacyPaymentsRequest::class;
    public const DELETE_REQUEST = DeleteLegacyPaymentRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $type = null,
        public ?array $bank_account = null,
        public ?array $payment = null,
        public ?string $instruction_id = null,
        public ?string $status = null,
        public ?string $created_at = null,
    ) {
    }

    public function cancel(?string $paymentId = null): LegacyPayment
    {
        $targetId = $paymentId ?? $this->uuid;

        if ($targetId === null) {
            throw new \RuntimeException('uuid is required to cancel a legacy payment.');
        }

        $request = new CancelLegacyPaymentRequest($targetId);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }
}
