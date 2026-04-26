<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteTaskRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $taskId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/task/{$this->taskId}";
    }
}
