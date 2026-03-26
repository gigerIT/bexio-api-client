<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\ContactSectors\Requests;

use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchContactSectorRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = []) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/contact_branch/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return ContactSector::collect($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }
}
