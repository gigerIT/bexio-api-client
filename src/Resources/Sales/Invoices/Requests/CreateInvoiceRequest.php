<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Invoices\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateInvoiceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Contact $contact)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/kb_invoice";
    }

    protected function defaultBody(): array
    {
        return $this->contact->toArray();
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::from($response->json());
    }

}
