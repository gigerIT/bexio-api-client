<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Requests\CreateInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\DeleteInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoicesRequest;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasSubItemPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCast;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\SalesTax;
use Bexio\Support\Concerns\HasOfficeLink;
use Saloon\Http\Response;
use Spatie\LaravelData\Attributes\WithCast;

class Invoice extends Resource implements KbDocumentContract
{
    use HasComments;
    use HasSubItemPositions;
    use HasOfficeLink;

    const DOCUMENT_TYPE = KbDocumentType::INVOICE;

    public const INDEX_REQUEST = GetInvoicesRequest::class;

    public const SHOW_REQUEST = GetInvoiceRequest::class;
    public const CREATE_REQUEST = CreateInvoiceRequest::class;

    public const DELETE_REQUEST = DeleteInvoiceRequest::class;

    public const SHOW_URL = '/index.php/kb_invoice/show/id/{id}';

    public string $total_gross;
    public string $total_net;
    public string $total_taxes;
    public string $total;
    public float $total_rounding_difference;
    public string $contact_address;
    public InvoiceStatus $kb_item_status_id;
    public string $updated_at;

    /** @var SalesTax[] */
    public array $taxs;
    public string $network_link;
    public ?string $total_received_payments;
    public ?string $total_credit_vouchers;
    public ?string $total_remaining_payments;
    public ?int $esr_id;
    public ?int $qr_invoice_id;
    public ?string $viewed_by_client_at;
    public ?string $invoice_date = null;
    public ?string $currency_code = null;
    public ?float $exchange_rate = null;
    public ?float $base_currency_amount = null;
    public ?string $base_currency_code = null;

    public ?int $project_id;


    public function __construct(
        public ?int                    $id = null,
        public ?string                 $document_nr = null,
        public ?string                 $title = null,
        public ?int                    $contact_id = null,
        public ?int                    $contact_sub_id = null,
        public ?int                    $user_id = 1,
        public ?int                    $pr_project_id = null,
        public ?int                    $logopaper_id = null,
        public ?int                    $language_id = null,

        public ?int                    $bank_account_id = null,
        public ?int                    $currency_id = null,
        public ?int                    $payment_type_id = null,

        public ?string                 $header = null,
        public ?string                 $footer = null,

        public ?MwstType               $mwst_type = null,
        public ?bool                   $mwst_is_net = null,
        public ?bool                   $show_position_taxes = null,

        public ?string                 $is_valid_from = null,
        public ?string                 $is_valid_to = null,

        public ?string                 $contact_address_manual = null,

        public ?string                 $reference = null,
        public ?string                 $api_reference = null,

        public ?string                 $template_slug = null,

        /** @var ItemPositionCollection<int, ItemPosition> */
        #[WithCast(ItemPositionCast::class)]
        public ?ItemPositionCollection $positions = null,
    )
    {
        $this->positions = $positions ?? new ItemPositionCollection([]);
    }

    public static function createFromApiPayload(array $payload): static
    {
        $invoiceDate = $payload['invoice_date'] ?? $payload['is_valid_from'] ?? null;

        if ($invoiceDate !== null) {
            $payload['invoice_date'] = $invoiceDate;
            $payload['is_valid_from'] ??= $invoiceDate;
        }

        return static::from($payload);
    }

    /**
     * @param array<int, array<string, mixed>> $payloads
     * @return array<int, static>
     */
    public static function collectFromApiPayload(array $payloads): array
    {
        return array_map(static fn (array $payload): static => static::createFromApiPayload($payload), $payloads);
    }

    public function toApi(): Invoice
    {
        return $this->except(
            'id',
            'total_gross',
            'total_net',
            'total_taxes',
            'total',
            'total_rounding_difference',
            'contact_address',
            'kb_item_status_id',
            'updated_at',
            'taxs',
            'network_link',
            'total_received_payments',
            'total_credit_vouchers',
            'total_remaining_payments',
            'esr_id',
            'qr_invoice_id',
            'viewed_by_client_at',
            'invoice_date',
            'currency_code',
            'exchange_rate',
            'base_currency_amount',
            'base_currency_code',
            'project_id',
        );
    }


    public function issue(?int $id = null): Response
    {
        return $this->client()->send(new Requests\IssueInvoiceRequest($id ?? $this->id));
    }

    public function revertIssue(?int $id = null): Response
    {
        return $this->client()->send(new Requests\RevertIssueInvoiceRequest($id ?? $this->id));
    }


}
