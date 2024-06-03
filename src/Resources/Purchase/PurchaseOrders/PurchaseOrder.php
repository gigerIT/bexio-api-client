<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders;

use Bexio\Resources\Purchase\PurchaseOrders\Enums\PurchaseOrderStatus;
use Bexio\Resources\Purchase\PurchaseOrders\Requests\CreatePurchaseOrderRequest;
use Bexio\Resources\Resource;

class PurchaseOrder extends Resource
{
    const CREATE_REQUEST = CreatePurchaseOrderRequest::class;

    public readonly PurchaseOrderStatus $kb_item_status_id;

    public readonly ?string $viewed_by_client_at;

    public function __construct(
        public int     $contact_id,

        public ?int    $id = null,
        public ?string $document_nr = null,
        public ?int    $kb_payment_template_id = null,
        public ?int    $payment_type_id = null,
        public ?string $title = null,
        public ?int    $contact_sub_id = null,
        public ?string $template_slug = null,
        public ?int    $user_id = null,
        public ?int    $project_id = null,
        public ?int    $logopaper_id = null,
        public ?array  $language = null,
        public ?int    $language_id = null,
        public ?int    $bank_account_id = null,
        public ?array  $currency = null,
        public ?int    $currency_id = null,
        public ?string $header = null,
        public ?string $footer = null,
        public ?string $mwst_type = null,
        public ?bool   $mwst_is_net = null,
        public ?bool   $is_compact_view = null,
        public ?bool   $show_position_taxes = null,
        public ?int    $salesman_user_id = null,
        public ?string $is_valid_from = null,
        public ?string $is_valid_to = null,
        public ?string $delivery_address_type = null,
        public ?string $contact_address_manual = null,
        public ?string $delivery_address_manual = null,
        public ?int    $nb_decimals_amount = null,
        public ?int    $nb_decimals_price = null,
        public ?string $terms_of_payment_text = null,
        public ?string $reference = null,
        public ?string $api_reference = null,
        public ?string $mail = null,
        public ?string $is_valid_until = null,
        public ?string $created_at = null,
        public ?string $updated_at = null,
        public ?array  $custom_translations = null,
        public ?string $date_format = null,
        public ?array  $positions = null
    )
    {
    }
}