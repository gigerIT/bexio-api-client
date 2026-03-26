<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactGroups\Requests;

use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactGroupRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $contactGroupId) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_group/{$this->contactGroupId}";
    }

    public function createDtoFromResponse(Response $response): ContactGroup
    {
        return ContactGroup::from($response->json());
    }
}
