<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\ContactSectors\Requests;

use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactSectorRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $contactSectorId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact_branch/{$this->contactSectorId}";
    }


    public function createDtoFromResponse(Response $response): ContactSector
    {
        return ContactSector::from($response->json());
    }
}

