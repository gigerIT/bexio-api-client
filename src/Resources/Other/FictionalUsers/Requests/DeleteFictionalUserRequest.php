<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteFictionalUserRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly int $fictionalUserId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/3.0/fictional_users/{$this->fictionalUserId}";
    }
}
