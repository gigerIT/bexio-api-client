<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateContactRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Contact $contact)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/contact/{$this->contact->id}";
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::from($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->contact->except("is_lead", "updated_at", "profile_image")->toArray();
    }

}
