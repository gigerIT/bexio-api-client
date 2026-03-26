<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactRelationRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $contactRelationId) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_relation/{$this->contactRelationId}";
    }

    public function createDtoFromResponse(Response $response): ContactRelation
    {
        return ContactRelation::from($response->json());
    }
}
