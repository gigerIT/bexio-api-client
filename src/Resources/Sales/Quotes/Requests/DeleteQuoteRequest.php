<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteQuoteRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/kb_offer/{$this->id}";
    }
}
