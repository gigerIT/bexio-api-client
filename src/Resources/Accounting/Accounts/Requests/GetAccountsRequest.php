<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Accounts\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAccountsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/2.0/accounts";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Account::collect($response->json());
    }

}
