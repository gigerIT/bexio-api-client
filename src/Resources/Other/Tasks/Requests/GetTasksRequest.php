<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTasksRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/task';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Task::collect($response->json());
    }
}

