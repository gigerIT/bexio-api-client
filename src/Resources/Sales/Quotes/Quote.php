<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Resource;

class Quote extends Resource
{
    public function __construct(
        public readonly ?int    $id,
        public readonly ?string $document_nr,
        public readonly ?string $title,
        public readonly ?int    $contact_id,
        public readonly ?int    $contact_sub_id,
        public readonly ?int    $user_id,
        public readonly ?int    $project_id,
        public readonly ?int    $language_id,
        public readonly ?int    $bank_account_id,
        public readonly ?int    $currency_id,
        public readonly ?int    $payment_type_id,
        public readonly ?string $header,
        public readonly ?string $footer,
        public readonly ?string $total_gross,
        public readonly ?string $total_net,
        public readonly ?string $total_taxes,
        public readonly ?string $total,
        public readonly ?float  $total_rounding_difference,
        public readonly ?int    $mwst_type,
        public readonly ?bool   $mwst_is_net,
        public readonly ?bool   $show_position_taxes,
        public readonly ?string $is_valid_from,
        public readonly ?string $is_valid_until,
        public readonly ?string $contact_address,
        public readonly ?int    $delivery_address_type,
        public readonly ?string $delivery_address,
        public readonly ?int    $kb_item_status_id,
        public readonly ?string $api_reference,
        public readonly ?string $viewed_by_client_at,
        public readonly ?int    $kb_terms_of_payment_template_id,
        public readonly ?bool   $show_total,
        public readonly ?string $updated_at,
        public readonly ?string $template_slug,
        public readonly ?array  $taxs,
        public readonly ?string $network_link,
        public readonly ?array  $positions
    )
    {
    }
}