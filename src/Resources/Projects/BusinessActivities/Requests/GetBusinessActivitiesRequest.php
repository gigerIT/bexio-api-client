<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetBusinessActivitiesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/client_service';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return BusinessActivity::collect($response->json());
    }
}


