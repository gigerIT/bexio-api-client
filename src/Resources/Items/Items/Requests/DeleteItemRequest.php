<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\Items\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteItemRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected int $articleId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/article/{$this->articleId}";
    }
}



