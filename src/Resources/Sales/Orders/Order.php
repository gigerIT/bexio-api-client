<?php

declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasSubItemPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCast;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Requests\CreateOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\DeleteOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrdersRequest;
use Bexio\Support\Concerns\HasOfficeLink;
use Spatie\LaravelData\Attributes\WithCast;

class Order extends Resource implements KbDocumentContract
{
    use HasComments;
    use HasOfficeLink;
    use HasSubItemPositions;

    public const DOCUMENT_TYPE = KbDocumentType::ORDER;

    public const INDEX_REQUEST = GetOrdersRequest::class;

    public const SHOW_REQUEST = GetOrderRequest::class;

    public const CREATE_REQUEST = CreateOrderRequest::class;

    public const DELETE_REQUEST = DeleteOrderRequest::class;

    public const SHOW_URL = '/index.php/kb_order/show/id/{id}';

    public string $document_nr;

    public string $total_gross;

    public string $total_net;

    public string $total_taxes;

    public string $total;

    public float $total_rounding_difference;

    public string $contact_address;

    public string $delivery_address;

    public int $kb_item_status_id;

    public string $updated_at;

    /** @var array<int, mixed> */
    public array $taxs = [];

    public string $network_link;

    public ?bool $mwst_is_net = null;

    public ?int $logopaper_id = null;

    public ?int $esr_id = null;

    public ?int $qr_invoice_id = null;

    public ?string $viewed_by_client_at = null;

    public ?int $project_id = null;

    public ?int $pr_project_id = null;

    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?int $contact_id = null,
        public ?int $contact_sub_id = null,
        public ?int $user_id = 1,
        public ?int $language_id = null,
        public ?int $bank_account_id = null,
        public ?int $currency_id = null,
        public ?int $payment_type_id = null,
        public ?string $header = null,
        public ?string $footer = null,
        public ?MwstType $mwst_type = null,
        public ?bool $show_position_taxes = null,
        public ?string $is_valid_from = null,
        public ?string $is_valid_to = null,
        public ?string $reference = null,
        public ?string $api_reference = null,
        public ?string $template_slug = null,
        /** @var ItemPositionCollection<int, ItemPosition> */
        #[WithCast(ItemPositionCast::class)]
        public ?ItemPositionCollection $positions = null,
    ) {
        $this->positions = $positions ?? new ItemPositionCollection([]);
    }
}
