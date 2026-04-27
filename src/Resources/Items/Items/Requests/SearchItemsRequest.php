<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\Items\Requests;

use Bexio\Resources\Items\Items\Item;
use Bexio\Support\Requests\SearchRequest;
use Saloon\Http\Response;

class SearchItemsRequest extends SearchRequest
{
    public function resolveEndpoint(): string
    {
        return '/2.0/article/search';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return Item::collect($response->json());
    }
}



