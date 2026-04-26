<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Bexio\Resources\Other\FictionalUsers\FictionalUser;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateFictionalUserRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly FictionalUser $fictionalUser)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/fictional_users';
    }

    protected function defaultBody(): array
    {
        return $this->fictionalUser->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): FictionalUser
    {
        return FictionalUser::from($response->json());
    }
}
