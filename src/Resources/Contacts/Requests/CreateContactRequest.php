<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Requests;

use Bexio\Resources\Contacts\Contact;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateContactRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function resolveEndpoint(): string
    {
        return "/contact";
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::from($response->json());
    }

}
