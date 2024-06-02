<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales;

use Bexio\Resources\Resource;

class KbDocument extends Resource
{
    public ?int $id;
    public ?string $document_nr;
    public ?string $title;
    public ?int $contact_id;
    public ?int $contact_sub_id;
    public ?int $user_id;
    public ?int $project_id;
    public ?int $language_id;
    public ?int $bank_account_id;
    public ?int $currency_id;
    public ?int $payment_type_id;

    public ?string $header;
    public ?string $footer;
    public ?string $total_gross;
    public ?string $total_net;
    public ?string $total_taxes;
    public ?string $total;
    public ?float $total_rounding_difference;
    public ?int $mwst_type;
    public ?bool $mwst_is_net;
    public ?bool $show_position_taxes;
    public ?string $is_valid_from;
    public ?string $is_valid_until;
    public ?string $contact_address;
    public ?int $delivery_address_type;
    public ?string $delivery_address;
    public ?int $kb_item_status_id;
    public ?string $api_reference;
    public ?string $viewed_by_client_at;
    public ?int $kb_terms_of_payment_template_id;
    public ?bool $show_total;
    public ?string $updated_at;
    public ?string $template_slug;
    public ?array $taxs;
    public ?string $network_link;
    public ?array $positions;
}