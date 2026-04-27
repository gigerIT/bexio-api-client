<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities\Requests;

use Bexio\Resources\Projects\BusinessActivities\BusinessActivity;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchBusinessActivitiesRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/client_service/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return BusinessActivity::collect($response->json());
    }
}


