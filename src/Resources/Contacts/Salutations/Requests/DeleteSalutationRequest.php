<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Salutations\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteSalutationRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $salutationId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/salutation/{$this->salutationId}";
    }
}

