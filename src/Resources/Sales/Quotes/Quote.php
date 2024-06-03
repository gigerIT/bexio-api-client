<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;

class Quote extends Resource
{
    public readonly string $total_gross;
    public readonly string $total_net;
    public readonly string $total_taxes;
    public readonly string $total;
    public readonly float $total_rounding_difference;
    public readonly bool $show_total;

    public readonly string $contact_address;

    public readonly string $delivery_address;
    public readonly QuoteStatus $kb_item_status_id;

    public readonly string $updated_at;

    public readonly array $taxs;

    public readonly string $network_link;


    public function __construct(
        public ?int    $id = null,
        public ?string $document_nr = null,
        public ?string $title = null,
        public ?int    $contact_id = null,
        public ?int    $contact_sub_id = null,
        public ?int    $user_id = 1,
        public ?int    $project_id = null,
        public ?int    $language_id = null,

        public ?int    $bank_account_id = null,
        public ?int    $currency_id = null,
        public ?int    $payment_type_id = null,

        public ?string $header = null,
        public ?string $footer = null,

        public ?int    $mwst_type = null,
        public ?bool   $mwst_is_net = null,
        public ?bool   $show_position_taxes = null,

        public ?string $is_valid_from = null,
        public ?string $is_valid_until = null,

        public ?int    $delivery_address_type = null,

        public ?string $api_reference = null,

        public ?string $viewed_by_client_at = null,
        public ?int    $kb_terms_of_payment_template_id = null,
        public ?string $template_slug = null,
        public ?array  $positions = null,
    )
    {
    }
}