<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\TaskPriority;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaskPrioritiesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/todo_priority';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return TaskPriority::collect($response->json());
    }
}
