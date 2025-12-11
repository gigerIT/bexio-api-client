<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes\Requests;

use Bexio\Resources\Projects\CommunicationTypes\CommunicationType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCommunicationTypeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(readonly protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/communication_kind/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): CommunicationType
    {
        return CommunicationType::from($response->json());
    }
}


