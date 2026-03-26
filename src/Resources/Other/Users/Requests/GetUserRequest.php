<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Users\Requests;

use Bexio\Resources\Other\Users\User;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetUserRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/3.0/users/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): User
    {
        return User::from($response->json());
    }
}
