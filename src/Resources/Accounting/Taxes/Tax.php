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

    public int $id;
    public string $uuid;
    public string $name;
    public string $code;
    public ?string $digit;
    public string $type;
    public ?int $account_id;
    public ?string $tax_settlement_type;
    public ?float $value;
    public ?float $net_tax_value;
    public ?int $start_year;
    public ?int $end_year;
    public ?bool $is_active;
    public ?string $display_name;
}