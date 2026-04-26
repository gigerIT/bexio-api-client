<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateTaskRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Task $task)
    {
        if ($this->task->id === null) {
            throw new \InvalidArgumentException('id is required to update a task.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/task/{$this->task->id}";
    }

    protected function defaultBody(): array
    {
        $body = $this->task->toApi();

        if (! isset($body['remember_type_id'], $body['remember_time_id'])) {
            unset($body['have_remember']);
        }

        return $body;
    }

    public function createDtoFromResponse(Response $response): Task
    {
        return Task::from($response->json());
    }
}
