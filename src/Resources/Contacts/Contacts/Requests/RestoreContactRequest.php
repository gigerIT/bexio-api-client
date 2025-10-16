<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class RestoreContactRequest extends Request
{
    protected Method $method = Method::PATCH;

    public function __construct(protected readonly int $contactId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contactId}/restore";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

