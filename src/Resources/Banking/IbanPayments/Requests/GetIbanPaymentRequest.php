<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\IbanPayments\Requests;

use Bexio\Resources\Banking\IbanPayments\IbanPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetIbanPaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string|int $bankAccountId,
        protected readonly string|int $paymentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/bank_accounts/{$this->bankAccountId}/iban_payments/{$this->paymentId}";
    }

    public function createDtoFromResponse(Response $response): IbanPayment
    {
        return IbanPayment::from($response->json())
            ->withBankAccountId($this->bankAccountId);
    }
}


