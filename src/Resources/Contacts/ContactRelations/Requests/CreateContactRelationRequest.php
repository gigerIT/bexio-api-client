<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateContactRelationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected ContactRelation $contactRelation)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/contact_relation";
    }

    protected function defaultBody(): array
    {
        return $this->contactRelation->except("id", "updated_at")->toArray();
    }

    public function createDtoFromResponse(Response $response): ContactRelation
    {
        return ContactRelation::from($response->json());
    }

}

