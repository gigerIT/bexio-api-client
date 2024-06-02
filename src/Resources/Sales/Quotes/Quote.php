<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Resource;

/**
 * title
 * string or null
 * contact_id
 * integer or null
 * References a contact object
 *
 * contact_sub_id
 * integer or null
 * References a contact object
 *
 * user_id
 * integer
 * References a user object
 *
 * pr_project_id
 * integer or null
 * References a project object
 *
 * logopaper_id
 * integer
 * Deprecated
 * language_id
 * integer
 * References a language object
 *
 * bank_account_id
 * integer
 * References a bank account object
 *
 * currency_id
 * integer
 * References a currency object
 *
 * payment_type_id
 * integer
 * References a payment type object
 *
 * header
 * string
 * footer
 * string
 * mwst_type
 * integer
 * Enum: 0 1 2
 * value    description
 * 0    including taxes
 * 1    excluding taxes
 * 2    exempt from taxes
 * mwst_is_net
 * boolean
 * This value affects the total if the field mwst_type has been set to 0.
 * false = Taxes are included in the total
 * true = Taxes will be added to the total
 *
 * show_position_taxes
 * boolean
 * is_valid_from
 * string <date>
 * is_valid_until
 * string <date>
 * delivery_address_type
 * integer
 * api_reference
 * string or null
 * This field can only be read and edited by the api. It can be used to save references to other systems.
 *
 * viewed_by_client_at
 * string or null
 * kb_terms_of_payment_template_id
 * integer or null
 * template_slug
 * string or null
 * References a document template slug
 *
 * positions
 * Array of PositionCustomExtended (object) or PositionArticleExtended (object) or PositionTextExtended (object) or PositionSubtotalExtended (object) or PositionPagebreakExtended (object) or PositionDiscountExtended (object)
 * Please note that you can combine multiple positions. This means that an array containing KbPositionCustom and KbPositionArticle positions is valid.
 *
 * Array
 * Any of PositionCustomExtendedPositionArticleExtendedPositionTextExtendedPositionSubtotalExtendedPositionPagebreakExtendedPositionDiscountExtended
 * amount
 * string
 * unit_id
 * integer
 * References a unit object
 *
 * account_id
 * integer
 * References an account object
 *
 * tax_id
 * integer
 * References a tax object
 *
 * Please note that only active sales taxes can be used as references on the document types quote, order and invoice. An easy way to retrieve all valid taxes is by calling the taxes endpoint with the query parameters types=sales_tax&scope=active (this would result in the path /3.0/taxes?types=sales_tax&scope=active).
 *
 * text
 * string
 * unit_price
 * string
 * discount_in_percent
 * string
 * type
 * string
 * Value: "KbPositionCustom"
 * Must always be KbPositionCustom
 *
 * parent_id
 * integer or null
 */
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