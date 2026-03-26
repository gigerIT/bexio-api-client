<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\QrPayments\Requests;

use Bexio\Resources\Banking\QrPayments\QrPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetQrPaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string|int $bankAccountId,
        protected readonly string|int $paymentId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/bank_accounts/{$this->bankAccountId}/qr_payments/{$this->paymentId}";
    }

    public function createDtoFromResponse(Response $response): QrPayment
    {
        return QrPayment::from($response->json())
            ->withBankAccountId($this->bankAccountId);
    }
}
