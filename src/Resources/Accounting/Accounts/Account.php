<?php
declare(strict_types=1);


namespace Bexio\Resources\Accounting\Accounts;

use Bexio\Resources\Accounting\Accounts\Requests\GetAccountsRequest;
use Bexio\Resources\Resource;

/**
 * {
 * "id": 1,
 * "account_no": "3201",
 * "name": "Gross proceeds credit sales",
 * "account_group_id": 65,
 * "account_type": 1,
 * "tax_id": 40,
 * "is_active": true,
 * "is_locked": false
 * }
 */
class Account extends Resource
{
    const INDEX_REQUEST = GetAccountsRequest::class;

    public int $id;
    public string $account_no;
    public string $name;
    public int $account_group_id;
    public int $account_type;
    public ?int $tax_id;
    public bool $is_active;
    public bool $is_locked;
}