<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\Concerns\CreatesSalesDocumentsWithDeferredArticlePositions;
use Bexio\Resources\Sales\Concerns\ResolvesKbDocumentId;
use Bexio\Resources\Sales\DocumentCopyPayload;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\Email\Email;
use Bexio\Resources\Sales\Invoices\Enums\InvoiceStatus;
use Bexio\Resources\Sales\Invoices\Payments\InvoicePayment;
use Bexio\Resources\Sales\Invoices\Payments\Requests\CreateInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\DeleteInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentsRequest;
use Bexio\Resources\Sales\Invoices\Requests\CancelInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\CopyInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\CreateInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\DeleteInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoicePdfRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\GetInvoicesRequest;
use Bexio\Resources\Sales\Invoices\Requests\MarkInvoiceAsSentRequest;
use Bexio\Resources\Sales\Invoices\Requests\SendInvoiceRequest;
use Bexio\Resources\Sales\Invoices\Requests\UpdateInvoiceRequest;
use Bexio\Resources\Sales\ItemPositions\Collections\ItemPositionCollection;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasPositions;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasSubItemPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\ItemPositions\ItemPositionCast;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\SalesTax;
use Bexio\Support\Concerns\HasOfficeLink;
use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Spatie\LaravelData\Attributes\WithCast;

/**
 * @method InvoiceQueryBuilder query()
 */
class Invoice extends Resource implements KbDocumentContract
{
    use HasComments;
    use HasPositions;
    use HasSubItemPositions;
    use HasOfficeLink;
    use ResolvesKbDocumentId;
    use CreatesSalesDocumentsWithDeferredArticlePositions;

    const DOCUMENT_TYPE = KbDocumentType::INVOICE;

    public const INDEX_REQUEST = GetInvoicesRequest::class;
    public const QUERY_BUILDER = InvoiceQueryBuilder::class;

    public const SHOW_REQUEST = GetInvoiceRequest::class;
    public const CREATE_REQUEST = CreateInvoiceRequest::class;
    public const UPDATE_REQUEST = UpdateInvoiceRequest::class;

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

    public function toUpdateApi(): Invoice
    {
        return $this->except(
            'id',
            'document_nr',
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
            'positions',
        );
    }

    protected function emptyPositionsForDeferredArticleCreate(): ItemPositionCollection
    {
        return new ItemPositionCollection();
    }

    protected function setPositionsForDeferredArticleCreate(Collection $positions): void
    {
        $this->positions = $positions instanceof ItemPositionCollection
            ? $positions
            : new ItemPositionCollection($positions->all());
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
            'document_nr',
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
            'mwst_is_net',
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
        return $this->client()->send(new Requests\RevertIssueInvoiceRequest($this->resolveInvoiceId($id)));
    }

    public function pdf(?int $id = null, ?bool $logopaper = null): DocumentPdf
    {
        $request = new GetInvoicePdfRequest($this->resolveInvoiceId($id), $logopaper);

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    public function copy(?int $id = null, DocumentCopyPayload|array|null $payload = null): Invoice
    {
        $request = new CopyInvoiceRequest($this->resolveInvoiceId($id), $this->copyPayload($payload));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    public function cancel(?int $id = null): Response
    {
        return $this->client()->send(new CancelInvoiceRequest($this->resolveInvoiceId($id)));
    }

    public function markAsSent(?int $id = null): Response
    {
        return $this->client()->send(new MarkInvoiceAsSentRequest($this->resolveInvoiceId($id)));
    }

    public function send(Email $email, ?int $id = null): Response
    {
        return $this->client()->send(new SendInvoiceRequest($this->resolveInvoiceId($id), $email));
    }

    public function payments(?int $id = null, int $limit = 500, int $offset = 0): array
    {
        $request = new GetInvoicePaymentsRequest($this->resolveInvoiceId($id), $limit, $offset);

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    public function createPayment(InvoicePayment $payment, ?int $id = null): InvoicePayment
    {
        $payment->kb_invoice_id = $this->resolveInvoiceId($id ?? $payment->kb_invoice_id);
        $request = new CreateInvoicePaymentRequest($payment);

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    public function payment(int $paymentId, ?int $id = null): InvoicePayment
    {
        $invoiceId = $this->resolveInvoiceId($id);
        $request = new GetInvoicePaymentRequest($invoiceId, $paymentId);

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    public function deletePayment(int $paymentId, ?int $id = null): bool
    {
        return $this->client()
            ->send(new DeleteInvoicePaymentRequest($this->resolveInvoiceId($id), $paymentId))
            ->successful();
    }

    private function resolveInvoiceId(?int $id): int
    {
        return $id ?? (int) $this->resolveResourceId();
    }

    private function copyPayload(DocumentCopyPayload|array|null $payload): DocumentCopyPayload|array
    {
        if ($payload !== null) {
            return $payload;
        }

        return new DocumentCopyPayload(
            contact_id: $this->contact_id,
            contact_sub_id: $this->contact_sub_id,
            is_valid_from: $this->is_valid_from,
            title: $this->title,
        );
    }
}
