<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\AccountGroups;

use Bexio\Resources\Accounting\AccountGroups\Requests\GetAccountGroupRequest;
use Bexio\Resources\Accounting\AccountGroups\Requests\GetAccountGroupsRequest;
use Bexio\Resources\Resource;
use Spatie\LaravelData\Attributes\MapInputName;

class AccountGroup extends Resource
{
    public const INDEX_REQUEST = GetAccountGroupsRequest::class;
    public const SHOW_REQUEST = GetAccountGroupRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $account_no = null,
        public ?string $name = null,
        #[MapInputName('parent_fibu_account_group_id')]
        public ?int $parent_id = null,
        public ?bool $is_active = null,
        public ?bool $is_locked = null,
    ) {
    }
}

