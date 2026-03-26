<?php

declare(strict_types=1);

namespace Bexio\Resources\Sales\DocumentSettings;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\DocumentSettings\Requests\GetDocumentSettingsRequest;

class DocumentSetting extends Resource
{
    public const INDEX_REQUEST = GetDocumentSettingsRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $text = null,
        public ?string $kb_item_class = null,
        public ?string $enumeration_format = null,
        public ?bool $use_automatic_enumeration = null,
        public ?bool $use_yearly_enumeration = null,
        public ?int $next_nr = null,
        public ?int $nr_min_length = null,
        public ?int $default_time_period_in_days = null,
        public ?int $default_logopaper_id = null,
        public ?int $default_language_id = null,
        public ?int $default_client_bank_account_new_id = null,
        public ?int $default_currency_id = null,
        public ?int $default_mwst_type = null,
        public ?bool $default_mwst_is_net = null,
        public ?int $default_nb_decimals_amount = null,
        public ?int $default_nb_decimals_price = null,
        public ?bool $default_show_position_taxes = null,
        public ?string $default_title = null,
        public ?bool $default_show_esr_on_same_page = null,
        public ?int $default_payment_type_id = null,
        public ?int $kb_terms_of_payment_template_id = null,
        public ?bool $default_show_total = null,
    ) {}
}
