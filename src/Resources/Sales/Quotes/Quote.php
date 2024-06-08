<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Requests\CreateQuoteRequest;

class Quote extends Resource
{
    use HasPositions;

    const CREATE_REQUEST = CreateQuoteRequest::class;

    public string $document_nr;

    public string $total_gross;
    public string $total_net;
    public string $total_taxes;
    public string $total;
    public float $total_rounding_difference;
    public bool $show_total;

    public string $contact_address;

    public string $delivery_address;
    public QuoteStatus $kb_item_status_id;

    public string $updated_at;

    public array $taxs;

    public string $network_link;

    public ?bool $mwst_is_net;


    public function __construct(
        public ?int    $id = null,
        public ?string $title = null,
        public ?int    $contact_id = null,
        public ?int    $contact_sub_id = null,
        public ?int    $user_id = 1,
        public ?int $pr_project_id = null,
        public ?int    $language_id = null,

        public ?int    $bank_account_id = null,
        public ?int    $currency_id = null,
        public ?int    $payment_type_id = null,

        public ?string $header = null,
        public ?string $footer = null,

        public ?int    $mwst_type = null,
        public ?bool   $show_position_taxes = null,

        public ?string $is_valid_from = null,
        public ?string $is_valid_until = null,

        public ?int    $delivery_address_type = null,

        public ?string $api_reference = null,

        public ?string $viewed_by_client_at = null,
        public ?int    $kb_terms_of_payment_template_id = null,
        public ?string $template_slug = null,

        /** @var ItemPosition[] */
        public ?array  $positions = null,
    )
    {
    }
}