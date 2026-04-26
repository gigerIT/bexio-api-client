<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices\InvoiceReminders;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\DocumentPdf;
use Bexio\Resources\Sales\Email\Email;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\CreateInvoiceReminderRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\DeleteInvoiceReminderRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\GetInvoiceReminderPdfRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\GetInvoiceReminderRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\GetInvoiceRemindersRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\MarkInvoiceReminderAsSentRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\MarkInvoiceReminderAsUnsentRequest;
use Bexio\Resources\Sales\Invoices\InvoiceReminders\Requests\SendInvoiceReminderRequest;
use Saloon\Http\Response;

/**
 * @method InvoiceReminderQueryBuilder query()
 */
class InvoiceReminder extends Resource
{
    public const INDEX_REQUEST = GetInvoiceRemindersRequest::class;
    public const SHOW_REQUEST = GetInvoiceReminderRequest::class;
    public const CREATE_REQUEST = CreateInvoiceReminderRequest::class;
    public const DELETE_REQUEST = DeleteInvoiceReminderRequest::class;
    public const QUERY_BUILDER = InvoiceReminderQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?int $kb_invoice_id = null,
        public ?string $title = null,
        public ?string $is_valid_from = null,
        public ?string $is_valid_to = null,
        public ?int $reminder_period_in_days = null,
        public ?int $reminder_level = null,
        public ?bool $show_positions = null,
        public ?string $remaining_price = null,
        public ?string $received_total = null,
        public ?bool $is_sent = null,
        public ?string $header = null,
        public ?string $footer = null,
    ) {
    }

    public function find(int|string $id): static
    {
        if (! $this->kb_invoice_id) {
            throw new \RuntimeException('kb_invoice_id is required to find an InvoiceReminder');
        }

        $request = $this->newRequestInstance(static::SHOW_REQUEST, $this->kb_invoice_id, $id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function delete(string|int|null $id = null): bool
    {
        if (! $this->kb_invoice_id) {
            throw new \RuntimeException('kb_invoice_id is required to delete an InvoiceReminder');
        }

        $request = $this->newRequestInstance(static::DELETE_REQUEST, $this->kb_invoice_id, $id ?? $this->id);
        $response = $this->client()->send($request);

        return $response->successful();
    }

    public function markAsSent(?int $id = null): Response
    {
        return $this->client()->send(new MarkInvoiceReminderAsSentRequest(
            invoiceId: $this->requireInvoiceId(),
            reminderId: $this->resolveReminderId($id),
        ));
    }

    public function markAsUnsent(?int $id = null): Response
    {
        return $this->client()->send(new MarkInvoiceReminderAsUnsentRequest(
            invoiceId: $this->requireInvoiceId(),
            reminderId: $this->resolveReminderId($id),
        ));
    }

    public function send(Email $email, ?int $id = null): Response
    {
        return $this->client()->send(new SendInvoiceReminderRequest(
            invoiceId: $this->requireInvoiceId(),
            reminderId: $this->resolveReminderId($id),
            email: $email,
        ));
    }

    public function pdf(?int $id = null, ?bool $logopaper = null): DocumentPdf
    {
        $request = new GetInvoiceReminderPdfRequest(
            invoiceId: $this->requireInvoiceId(),
            reminderId: $this->resolveReminderId($id),
            logopaper: $logopaper,
        );

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    private function requireInvoiceId(): int
    {
        if ($this->kb_invoice_id === null) {
            throw new \RuntimeException('kb_invoice_id is required for InvoiceReminder operations');
        }

        return $this->kb_invoice_id;
    }

    private function resolveReminderId(?int $id): int
    {
        $reminderId = $id ?? $this->id;

        if ($reminderId === null) {
            throw new \RuntimeException('id is required for InvoiceReminder operations');
        }

        return $reminderId;
    }
}
