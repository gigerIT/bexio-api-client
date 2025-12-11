<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReactivateProjectRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(readonly protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/pr_project/{$this->id}/reactivate";
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return (bool)($response->json('success') ?? $response->successful());
    }
}

