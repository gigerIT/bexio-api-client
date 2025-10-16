<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteContactRelationRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $contactRelationId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_relation/{$this->contactRelationId}";
    }
}

