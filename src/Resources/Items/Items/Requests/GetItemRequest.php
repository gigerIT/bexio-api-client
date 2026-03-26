<?php

declare(strict_types=1);

namespace Bexio\Resources\Items\Items\Requests;

use Bexio\Resources\Items\Items\Item;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetItemRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $articleId) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/article/{$this->articleId}";
    }

    public function createDtoFromResponse(Response $response): Item
    {
        return Item::from($response->json());
    }
}
