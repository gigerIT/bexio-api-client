<?php

declare(strict_types=1);

namespace Bexio\Resources\Accounting\AccountGroups\Requests;

use Bexio\Resources\Accounting\AccountGroups\AccountGroup;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAccountGroupsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/account_groups';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return AccountGroup::collect($response->json());
    }
}
