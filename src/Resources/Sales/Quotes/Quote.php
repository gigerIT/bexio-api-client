<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Quotes;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;
use Bexio\Resources\Sales\Comments\Traits\HasComments;
use Bexio\Resources\Sales\Concerns\CreatesSalesDocumentsWithDeferredArticlePositions;
use Bexio\Resources\Sales\Concerns\ResolvesKbDocumentId;
use Bexio\Resources\Sales\DocumentConversionPayload;
use Bexio\Resources\Sales\DocumentCopyPayload;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\Email\Email;
use Bexio\Resources\Sales\Invoices\Invoice;
use Bexio\Resources\Sales\ItemPositions\Concerns\HasPositions;
use Bexio\Resources\Sales\ItemPositions\ItemPosition;
use Bexio\Resources\Sales\KbDocumentContract;
use Bexio\Resources\Sales\MwstType;
use Bexio\Resources\Sales\Orders\Order;
use Bexio\Resources\Sales\Quotes\Enums\QuoteStatus;
use Bexio\Resources\Sales\Quotes\Requests\AcceptQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CopyQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CreateQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\DeleteQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuotePdfRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\GetQuotesRequest;
use Bexio\Resources\Sales\Quotes\Requests\CreateInvoiceFromQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\CreateOrderFromQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\IssueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\MarkQuoteAsSentRequest;
use Bexio\Resources\Sales\Quotes\Requests\ReissueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\RejectQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\RevertIssueQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\SendQuoteRequest;
use Bexio\Resources\Sales\Quotes\Requests\UpdateQuoteRequest;
use Bexio\Resources\Sales\SalesTax;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

/**
 * @method QuoteQueryBuilder query()
 */
class Quote extends Resource implements KbDocumentContract
{
    use HasComments;
    use HasPositions;
    use ResolvesKbDocumentId;
    use CreatesSalesDocumentsWithDeferredArticlePositions;

    const DOCUMENT_TYPE = KbDocumentType::OFFER;

    const INDEX_REQUEST = GetQuotesRequest::class;
    const QUERY_BUILDER = QuoteQueryBuilder::class;
    const SHOW_REQUEST = GetQuoteRequest::class;
    const CREATE_REQUEST = CreateQuoteRequest::class;
    const UPDATE_REQUEST = UpdateQuoteRequest::class;
    const DELETE_REQUEST = DeleteQuoteRequest::class;

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

    /** @var SalesTax[] */
    public array $taxs;

    public string $network_link;

    public ?bool $mwst_is_net;


    public function __construct(
        public ?int        $id = null,
        public ?string     $title = null,
        public ?int        $contact_id = null,
        public ?int        $contact_sub_id = null,
        public ?int        $user_id = 1,
        public ?int        $pr_project_id = null,
        public ?int        $language_id = null,

        public ?int        $bank_account_id = null,
        public ?int        $currency_id = null,
        public ?int        $payment_type_id = null,

        public ?string     $header = null,
        public ?string     $footer = null,

        public ?MwstType   $mwst_type = null,
        public ?bool       $show_position_taxes = null,

        public ?string     $is_valid_from = null,
        public ?string     $is_valid_until = null,

        public ?int        $delivery_address_type = null,

        public ?string     $api_reference = null,

        public ?string     $viewed_by_client_at = null,
        public ?int        $kb_terms_of_payment_template_id = null,
        public ?string     $template_slug = null,

        /** @var Collection<int, ItemPosition> */
        public ?Collection $positions = null,
    )
    {
    }

    public function toUpdateApi(): Quote
    {
        return $this->except(
            'id',
            'document_nr',
            'project_id',
            'total_gross',
            'total_net',
            'total_taxes',
            'total',
            'total_rounding_difference',
            'show_total',
            'contact_address',
            'delivery_address',
            'kb_item_status_id',
            'updated_at',
            'taxs',
            'network_link',
            'viewed_by_client_at',
            'positions',
        );
    }

    public function toApi(): Quote
    {
        return $this->except(
            'id',
            'document_nr',
            'project_id',
            'total_gross',
            'total_net',
            'total_taxes',
            'total',
            'total_rounding_difference',
            'show_total',
            'contact_address',
            'delivery_address',
            'kb_item_status_id',
            'updated_at',
            'taxs',
            'network_link',
            'mwst_is_net',
            'viewed_by_client_at',
        );
    }

    protected function emptyPositionsForDeferredArticleCreate(): Collection
    {
        return new Collection();
    }

    protected function setPositionsForDeferredArticleCreate(Collection $positions): void
    {
        $this->positions = $positions;
    }

    public function issue(?int $id = null): Response
    {
        return $this->client()->send(new IssueQuoteRequest($this->resolveQuoteId($id)));
    }

    public function revertIssue(?int $id = null): Response
    {
        return $this->client()->send(new RevertIssueQuoteRequest($this->resolveQuoteId($id)));
    }

    public function accept(?int $id = null): Response
    {
        return $this->client()->send(new AcceptQuoteRequest($this->resolveQuoteId($id)));
    }

    public function reject(?int $id = null): Response
    {
        return $this->client()->send(new RejectQuoteRequest($this->resolveQuoteId($id)));
    }

    public function reissue(?int $id = null): Response
    {
        return $this->client()->send(new ReissueQuoteRequest($this->resolveQuoteId($id)));
    }

    public function markAsSent(?int $id = null): Response
    {
        return $this->client()->send(new MarkQuoteAsSentRequest($this->resolveQuoteId($id)));
    }

    public function pdf(?int $id = null, ?bool $logopaper = null): DocumentPdf
    {
        $request = new GetQuotePdfRequest($this->resolveQuoteId($id), $logopaper);

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    public function send(Email $email, ?int $id = null): Response
    {
        return $this->client()->send(new SendQuoteRequest($this->resolveQuoteId($id), $email));
    }

    public function copy(?int $id = null, DocumentCopyPayload|array|null $payload = null): Quote
    {
        $request = new CopyQuoteRequest($this->resolveQuoteId($id), $this->copyPayload($payload));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    /**
     * @param array<int, \Bexio\Resources\Sales\DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function createOrder(?int $id = null, ?array $positions = null): Order
    {
        $quoteId = $this->resolveConversionSourceId($id);
        $request = new CreateOrderFromQuoteRequest($quoteId, $positions ?? $this->conversionPositionsFor($quoteId));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    /**
     * @param array<int, \Bexio\Resources\Sales\DocumentConversionPosition|array{id: int, type: string, amount: int|float|string}>|null $positions
     */
    public function createInvoice(?int $id = null, ?array $positions = null): Invoice
    {
        $quoteId = $this->resolveConversionSourceId($id);
        $request = new CreateInvoiceFromQuoteRequest($quoteId, $positions ?? $this->conversionPositionsFor($quoteId));

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }

    private function resolveConversionSourceId(?int $id): int
    {
        return $this->resolveQuoteId($id);
    }

    private function resolveQuoteId(?int $id): int
    {
        return $id ?? (int) $this->resolveResourceId();
    }

    /**
     * @return array<int, \Bexio\Resources\Sales\DocumentConversionPosition>
     */
    private function conversionPositionsFor(int $quoteId): array
    {
        if (isset($this->id) && $this->id === $quoteId && isset($this->positions)) {
            return DocumentConversionPayload::positionsFromSource($this->positions);
        }

        return DocumentConversionPayload::positionsFromSource($this->find($quoteId)->positions ?? []);
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
            pr_project_id: $this->pr_project_id,
            title: $this->title,
        );
    }
}
