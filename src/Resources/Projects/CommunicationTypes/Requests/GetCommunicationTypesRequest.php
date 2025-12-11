<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes\Requests;

use Bexio\Resources\Projects\CommunicationTypes\CommunicationType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCommunicationTypesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/2.0/communication_kind';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CommunicationType::collect($response->json());
    }
}


