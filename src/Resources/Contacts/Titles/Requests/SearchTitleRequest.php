<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Titles\Requests;

use Bexio\Resources\Contacts\Titles\Title;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchTitleRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $searchClauses = []) {}

    public function resolveEndpoint(): string
    {
        return '/2.0/title/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Title::collect($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->searchClauses;
    }
}
