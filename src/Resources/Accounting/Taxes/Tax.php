<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Taxes;

use Bexio\Resources\Accounting\Taxes\Requests\DeleteTaxRequest;
use Bexio\Resources\Accounting\Taxes\Requests\GetTaxesRequest;
use Bexio\Resources\Accounting\Taxes\Requests\GetTaxRequest;
use Bexio\Resources\Resource;

class Tax extends Resource
{
    const INDEX_REQUEST = GetTaxesRequest::class;

    const SHOW_REQUEST = GetTaxRequest::class;

    const DELETE_REQUEST = DeleteTaxRequest::class;

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