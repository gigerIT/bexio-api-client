<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Permissions\Requests;

use Bexio\Resources\Other\Permissions\Permission;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPermissionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/3.0/permissions';
    }

    /**
     * The API returns a single permissions object, not a list.
     * Wrap it in an array so it behaves like other index endpoints.
     */
    public function createDtoFromResponse(Response $response): array
    {
        return [Permission::from($response->json())];
    }
}
