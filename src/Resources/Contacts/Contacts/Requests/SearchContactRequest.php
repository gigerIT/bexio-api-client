<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Contacts\Requests;

use Bexio\Resources\Contacts\Contacts\Contact;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchContactRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/contact/search";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Contact::collect($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }

}
