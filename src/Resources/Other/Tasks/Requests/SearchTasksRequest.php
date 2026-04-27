<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks\Requests;

use Bexio\Resources\Other\Tasks\Task;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchTasksRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/task/search';
    }
    public function createDtoFromResponse(Response $response): array
    {
        return Task::collect($response->json());
    }
}
