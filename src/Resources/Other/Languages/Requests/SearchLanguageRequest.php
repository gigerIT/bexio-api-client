<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Languages\Requests;

use Bexio\Resources\Other\Languages\Language;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchLanguageRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/language/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Language::collect($response->json());
    }
}
