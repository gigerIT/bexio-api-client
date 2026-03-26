<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Users\Requests;

use Bexio\Resources\Other\Users\User;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAuthenticatedUserRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/users/me';
    }

    public function createDtoFromResponse(Response $response): User
    {
        return User::from($response->json());
    }
}
