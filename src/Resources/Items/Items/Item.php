<?php
declare(strict_types=1);

namespace Bexio\Resources\Items\Items;

use Bexio\Resources\Items\Items\Requests\CreateItemRequest;
use Bexio\Resources\Items\Items\Requests\DeleteItemRequest;
use Bexio\Resources\Items\Items\Requests\GetItemRequest;
use Bexio\Resources\Items\Items\Requests\GetItemsRequest;
use Bexio\Resources\Items\Items\Requests\UpdateItemRequest;
use Bexio\Resources\Resource;

/**
 * @method ItemQueryBuilder query()
 */
class Item extends Resource
{
    public const INDEX_REQUEST = GetItemsRequest::class;
    public const SHOW_REQUEST = GetItemRequest::class;
    public const CREATE_REQUEST = CreateItemRequest::class;
    public const UPDATE_REQUEST = UpdateItemRequest::class;
    public const DELETE_REQUEST = DeleteItemRequest::class;
    public const QUERY_BUILDER = ItemQueryBuilder::class;

    public ?int $stock_reserved_nr = null;
    public ?int $stock_available_nr = null;
    public ?int $stock_picked_nr = null;
    public ?int $stock_disposed_nr = null;
    public ?int $stock_ordered_nr = null;
    public ?int $tax_id = null;

    public function __construct(
        public int $article_type_id = 1,
        public int $user_id = 1,
        public string $intern_code = '',
        public string $intern_name = '',
        public ?int $id = null,
        public ?int $contact_id = null,
        public ?string $deliverer_code = null,
        public ?string $deliverer_name = null,
        public ?string $deliverer_description = null,
        public ?string $intern_description = null,
        public ?string $purchase_price = null,
        public ?string $sale_price = null,
        public ?float $purchase_total = null,
        public ?float $sale_total = null,
        public ?int $currency_id = null,
        public ?int $tax_income_id = null,
        public ?int $tax_expense_id = null,
        public ?int $unit_id = null,
        public bool $is_stock = false,
        public ?int $stock_id = null,
        public ?int $stock_place_id = null,
        public int $stock_nr = 0,
        public int $stock_min_nr = 0,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $weight = null,
        public ?int $volume = null,
        public ?string $html_text = null,
        public ?string $remarks = null,
        public ?float $delivery_price = null,
        public ?int $article_group_id = null,
        public ?int $account_id = null,
        public ?int $expense_account_id = null,
    ) {
    }
}

