<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Accounts\Requests;

use Bexio\Resources\Accounting\Accounts\Account;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchAccountsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/accounts/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Account::collect($response->json());
    }
}
