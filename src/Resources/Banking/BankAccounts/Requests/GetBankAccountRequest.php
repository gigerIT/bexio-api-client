<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\BankAccounts\Requests;

use Bexio\Resources\Banking\BankAccounts\BankAccount;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBankAccountRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string|int $bankAccountId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/banking/accounts/{$this->bankAccountId}";
    }

    public function createDtoFromResponse(Response $response): BankAccount
    {
        return BankAccount::from($response->json());
    }
}


