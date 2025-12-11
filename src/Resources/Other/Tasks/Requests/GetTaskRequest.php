<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaskRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/task/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Task
    {
        return Task::from($response->json());
    }
}

