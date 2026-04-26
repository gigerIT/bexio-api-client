<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Units\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteUnitRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $unitId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/unit/{$this->unitId}";
    }
}
