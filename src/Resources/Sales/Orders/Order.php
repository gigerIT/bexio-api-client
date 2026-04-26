<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Orders;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\Deliveries\Delivery;
use Bexio\Resources\Sales\DocumentConversionPayload;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasSubItemPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCast;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Requests\CreateDeliveryFromOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\CreateInvoiceFromOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\CreateOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\DeleteOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrderRequest;
use Bexio\Resources\Sales\Orders\Requests\GetOrdersRequest;
use Bexio\Support\Concerns\HasOfficeLink;
use Spatie\LaravelData\Attributes\WithCast;

/**
 * @method OrderQueryBuilder query()
 */
class Order extends Resource implements KbDocumentContract
{
    use HasComments;
    use HasSubItemPositions;
    use HasOfficeLink;

    public const DOCUMENT_TYPE = KbDocumentType::ORDER;

    public const INDEX_REQUEST = GetOrdersRequest::class;
    public const QUERY_BUILDER = OrderQueryBuilder::class;
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
        public ?int                    $id = null,
        public ?string                 $title = null,
        public ?int                    $contact_id = null,
        public ?int                    $contact_sub_id = null,
        public ?int                    $user_id = 1,
        public ?int                    $language_id = null,
        public ?int                    $bank_account_id = null,
        public ?int                    $currency_id = null,
        public ?int                    $payment_type_id = null,
        public ?string                 $header = null,
        public ?string                 $footer = null,
        public ?MwstType               $mwst_type = null,
        public ?bool                   $show_position_taxes = null,
        public ?string                 $is_valid_from = null,
        public ?string                 $is_valid_to = null,
        public ?string                 $reference = null,
        public ?string                 $api_reference = null,
        public ?string                 $template_slug = null,
        /** @var ItemPositionCollection<int, ItemPosition> */
        #[WithCast(ItemPositionCast::class)]
        public ?ItemPositionCollection $positions = null,
    ) {
        $this->positions = $positions ?? new ItemPositionCollection([]);
    }

    public function toApi(): Order
    {
        return $this->except(
            'id',
            'total_gross',
            'total_net',
            'total_taxes',
            'total',
            'total_rounding_difference',
            'contact_address',
            'delivery_address',
            'kb_item_status_id',
            'updated_at',
            'taxs',
            'network_link',
            'mwst_is_net',
            'esr_id',
            'qr_invoice_id',
            'viewed_by_client_at',
            'project_id',
            'is_valid_to',
            'reference',
        );
    }

    /**
     * @param array<int, \Bexio\Resources\Sales\DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function createDelivery(?int $id = null, ?array $positions = null): Delivery
    {
        $orderId = $this->resolveConversionSourceId($id);
        $request = new CreateDeliveryFromOrderRequest($orderId, $positions ?? $this->conversionPositionsFor($orderId));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    /**
     * @param array<int, \Bexio\Resources\Sales\DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function createInvoice(?int $id = null, ?array $positions = null): Invoice
    {
        $orderId = $this->resolveConversionSourceId($id);
        $request = new CreateInvoiceFromOrderRequest($orderId, $positions ?? $this->conversionPositionsFor($orderId));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    private function resolveConversionSourceId(?int $id): int
    {
        return $id ?? (int) $this->resolveResourceId();
    }

    /**
     * @return array<int, \Bexio\Resources\Sales\DocumentConversionPosition>
     */
    private function conversionPositionsFor(int $orderId): array
    {
        if (isset($this->id) && $this->id === $orderId && isset($this->positions)) {
            return DocumentConversionPayload::positionsFromSource($this->positions);
        }

        return DocumentConversionPayload::positionsFromSource($this->find($orderId)->positions ?? []);
    }
}
