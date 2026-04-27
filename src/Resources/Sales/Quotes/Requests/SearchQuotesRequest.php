<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\Quotes\Quote;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchQuotesRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/kb_offer/search';
    }
    public function createDtoFromResponse(Response $response): array
    {
        return Quote::collect($response->json());
    }
}
