<?php

declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes\Requests;

use Bexio\Resources\Projects\CommunicationTypes\CommunicationType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchCommunicationTypesRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = []) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/communication_kind/search';
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

    public function createDtoFromResponse(Response $response): array
    {
        return CommunicationType::collect($response->json());
    }
}
