<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Permissions;

use Bexio\Resources\Other\Permissions\Requests\GetPermissionsRequest;
use Bexio\Resources\Resource;

class Permission extends Resource
{
    public const INDEX_REQUEST = GetPermissionsRequest::class;

    /**
     * @param string[]|null $components
     * @param array<string, mixed>|null $permissions
     */
    public function __construct(
        public ?array $components = null,
        public ?array $permissions = null,
    ) {
    }
}

