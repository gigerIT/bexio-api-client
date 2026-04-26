<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateTaskRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Task $task)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/task';
    }

    protected function defaultBody(): array
    {
        return $this->task->toApi();
    }

    public function createDtoFromResponse(Response $response): Task
    {
        return Task::from($response->json());
    }
}
