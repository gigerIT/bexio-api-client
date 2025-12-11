<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\Items\Requests;

use Bexio\Resources\Items\Items\Item;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateItemRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Item $item)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/article/{$this->item->id}";
    }

    protected function defaultBody(): array
    {
        return $this->item->except(
            'stock_reserved_nr',
            'stock_available_nr',
            'stock_picked_nr',
            'stock_disposed_nr',
            'stock_ordered_nr',
            'tax_id'
        )->toArray();
    }

    public function createDtoFromResponse(Response $response): Item
    {
        return Item::from($response->json());
    }
}


