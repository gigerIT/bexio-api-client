<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactGroups\Requests;

use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateContactGroupRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly ContactGroup $contactGroup) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_group/{$this->contactGroup->id}";
    }

    protected function defaultBody(): array
    {
        return $this->contactGroup->except('id')->toArray();
    }

    public function createDtoFromResponse(Response $response): ContactGroup
    {
        return ContactGroup::from($response->json());
    }
}
