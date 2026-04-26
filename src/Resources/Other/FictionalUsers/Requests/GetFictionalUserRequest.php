<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Bexio\Resources\Other\FictionalUsers\FictionalUser;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetFictionalUserRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $fictionalUserId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/fictional_users/{$this->fictionalUserId}";
    }

    public function createDtoFromResponse(Response $response): FictionalUser
    {
        return FictionalUser::from($response->json());
    }
}
