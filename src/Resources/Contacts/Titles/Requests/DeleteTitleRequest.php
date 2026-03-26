<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Titles\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteTitleRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $titleId) {}

    public function resolveEndpoint(): string
    {
        return "/2.0/title/{$this->titleId}";
    }
}
