<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\QrPayments\Requests;

use Bexio\Resources\Banking\QrPayments\QrPayment;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateQrPaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly QrPayment $qrPayment)
    {
        if ($this->qrPayment->bank_account_id === null) {
            throw new \InvalidArgumentException('bank_account_id is required to create a QR payment.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/bank_accounts/{$this->qrPayment->bank_account_id}/qr_payments";
    }

    protected function defaultBody(): array
    {
        return $this->qrPayment->payment?->toArray() ?? [];
    }

    public function createDtoFromResponse(Response $response): QrPayment
    {
        return QrPayment::from($response->json())
            ->withBankAccountId($this->qrPayment->bank_account_id);
    }
}


