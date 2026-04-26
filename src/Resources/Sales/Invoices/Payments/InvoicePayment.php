<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\Payments;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Invoices\Payments\Requests\CreateInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\DeleteInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentRequest;
use Bexio\Resources\Sales\Invoices\Payments\Requests\GetInvoicePaymentsRequest;
use LogicException;

/**
 * @method InvoicePaymentQueryBuilder query()
 */
class InvoicePayment extends Resource
{
    public const INDEX_REQUEST = GetInvoicePaymentsRequest::class;
    public const SHOW_REQUEST = GetInvoicePaymentRequest::class;
    public const CREATE_REQUEST = CreateInvoicePaymentRequest::class;
    public const DELETE_REQUEST = DeleteInvoicePaymentRequest::class;
    public const QUERY_BUILDER = InvoicePaymentQueryBuilder::class;

    public function __construct(
        public ?int $kb_invoice_id = null,
        public ?int $id = null,
        public int|float|string|null $value = null,
        public ?string $date = null,
        public ?int $bank_account_id = null,
        public ?int $payment_type_id = null,
        public ?string $note = null,
        public ?string $title = null,
        public ?int $payment_service_id = null,
        public ?bool $is_client_account_redemption = null,
        public ?bool $is_cash_discount = null,
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {
    }

    public function forInvoice(int $invoiceId): static
    {
        $this->kb_invoice_id = $invoiceId;

        return $this;
    }

    public function find(int|string $id): static
    {
        $request = $this->newRequestInstance(static::SHOW_REQUEST, $this->requireInvoiceId(), $id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function delete(string|int|null $id = null): bool
    {
        $request = $this->newRequestInstance(static::DELETE_REQUEST, $this->requireInvoiceId(), $id ?? $this->id);
        $response = $this->client()->send($request);

        return $response->successful();
    }

    public function toApi(): InvoicePayment
    {
        return $this->except(
            'id',
            'kb_invoice_id',
            'title',
            'payment_service_id',
            'is_client_account_redemption',
            'is_cash_discount',
            'created_at',
            'updated_at',
        );
    }

    private function requireInvoiceId(): int
    {
        if ($this->kb_invoice_id === null) {
            throw new LogicException('Invoice payment operations require an invoice id. Call forInvoice() or set kb_invoice_id first.');
        }

        return $this->kb_invoice_id;
    }
}
