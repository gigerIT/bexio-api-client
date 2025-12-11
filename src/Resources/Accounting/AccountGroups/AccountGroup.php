<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\AccountGroups;

use Bexio\Resources\Accounting\AccountGroups\Requests\GetAccountGroupRequest;
use Bexio\Resources\Accounting\AccountGroups\Requests\GetAccountGroupsRequest;
use Bexio\Resources\Resource;

class AccountGroup extends Resource
{
    public const INDEX_REQUEST = GetAccountGroupsRequest::class;
    public const SHOW_REQUEST = GetAccountGroupRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $name = null,
        public ?int $parent_id = null,
    ) {
    }
}

