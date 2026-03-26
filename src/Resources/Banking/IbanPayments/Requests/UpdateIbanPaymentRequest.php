<?php

declare(strict_types=1);

namespace Bexio\Resources\Banking\IbanPayments\Requests;

use Bexio\Resources\Banking\IbanPayments\IbanPayment;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateIbanPaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected readonly IbanPayment $ibanPayment)
    {
        if ($this->ibanPayment->bank_account_id === null) {
            throw new \InvalidArgumentException('bank_account_id is required to update an IBAN payment.');
        }

        if ($this->ibanPayment->id === null) {
            throw new \InvalidArgumentException('id is required to update an IBAN payment.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/bank_accounts/{$this->ibanPayment->bank_account_id}/iban_payments/{$this->ibanPayment->id}";
    }

    protected function defaultBody(): array
    {
        return $this->ibanPayment->payment?->toArray() ?? [];
    }

    public function createDtoFromResponse(Response $response): IbanPayment
    {
        return IbanPayment::from($response->json())
            ->withBankAccountId($this->ibanPayment->bank_account_id);
    }
}
