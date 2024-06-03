<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Taxes;

use Bexio\Resources\Resource;

class Tax extends Resource
{
    public readonly int $id;
    public readonly string $uuid;
    public readonly string $name;
    public readonly string $code;
    public readonly ?string $digit;
    public readonly string $type;
    public readonly ?int $account_id;
    public readonly ?string $tax_settlement_type;
    public readonly ?float $value;
    public readonly ?float $net_tax_value;
    public readonly ?int $start_year;
    public readonly ?int $end_year;
    public readonly ?bool $is_active;
    public readonly ?string $display_name;

}