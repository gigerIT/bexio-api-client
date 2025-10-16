<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactGroups\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteContactGroupRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $contactGroupId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_group/{$this->contactGroupId}";
    }
}

