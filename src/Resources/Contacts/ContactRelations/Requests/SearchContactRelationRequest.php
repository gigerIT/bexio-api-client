<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchContactRelationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = []) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/contact_relation/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ContactRelation::collect($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }
}
