<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Bexio\Resources\Other\FictionalUsers\FictionalUser;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFictionalUserRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(protected readonly FictionalUser $fictionalUser)
    {
        if ($this->fictionalUser->id === null) {
            throw new \InvalidArgumentException('id is required to update a fictional user.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/fictional_users/{$this->fictionalUser->id}";
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
