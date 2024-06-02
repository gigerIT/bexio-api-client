<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/contact";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Contact::collect($response->json());
    }
}
