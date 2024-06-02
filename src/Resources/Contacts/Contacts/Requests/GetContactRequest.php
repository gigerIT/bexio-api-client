<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetContactRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/contact/$this->id";
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::from($response->json());
    }

}
