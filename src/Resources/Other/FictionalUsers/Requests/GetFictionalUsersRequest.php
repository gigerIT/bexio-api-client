<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Bexio\Resources\Other\FictionalUsers\FictionalUser;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetFictionalUsersRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/fictional_users';
    }

    protected function defaultQuery(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return FictionalUser::collect($response->json());
    }
}
