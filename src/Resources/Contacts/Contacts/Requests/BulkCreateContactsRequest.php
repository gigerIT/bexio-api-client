<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class BulkCreateContactsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $contacts) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/contact/_bulk_create';
    }

    protected function defaultBody(): array
    {
        return array_map(function (Contact $contact) {
            return $contact->except('updated_at', 'profile_image')->toArray();
        }, $this->contacts);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Contact::collect($response->json());
    }
}
