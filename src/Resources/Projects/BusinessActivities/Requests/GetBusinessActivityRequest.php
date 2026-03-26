<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBusinessActivityRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/client_service/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): BusinessActivity
    {
        return BusinessActivity::from($response->json());
    }
}
